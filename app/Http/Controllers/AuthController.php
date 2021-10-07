<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Validator;
use App\Http\Requests\AuthRequest;
use App\Services\AuthServices;

class AuthController extends Controller
{
    protected $authServices;

    public function __construct(AuthServices $authServices)
    {
        $this->authServices = $authServices;
    }

    /**
     * Display login view.
     */
    public function login()
    {
        return view('auth/login');
    }

    /**
     * Display register view.
     */
    public function register()
    {
        return view('auth/register');
    }

    /**
     * Validate data and register user.
     */

    public function registerUser(AuthRequest $request)
    {
        if ($request->validated()) {
            $result = $this->authServices->register($request);
            return redirect('/login');
        }
    }

    /**
     * Validate data, crrate token and login user.
     */
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->first('password')) {
                return redirect('/login')->with('message', 'Złe hasło.');
            }
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect('/login')->with('message', 'Zły e-mail lub hasło.');
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $this->productMain();

        return redirect('/');
    }

    /**
     * Get products to display in main page.
     */
    public function productMain()
    {
        $products = Product::select('id', 'name', 'photo', 'price')->paginate(9);
        return view('main', compact('products'));
    }

    /**
     * Password reset view.
     */
    public function passwordReset()
    {
        return view('auth/passwords/email');
    }

    /**
     * Resetting password for specific user.
     */
    public function resetByEmail(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if (!$user) {
            return redirect('password/reset')->with('message', 'Błędny email. Spróbuj ponownie.');
        }

        $details = [
            'title' => 'Resetowanie hasła',
            'url' => "http://127.0.0.1:8000/new-password/$user->id",
            'name' => $user->name
        ];

        Mail::to($user->email)->send(new ResetPasswordMail($details));

        return redirect('login');
    }

    /**
     * Password reset view.
     */
    public function newPassword($id)
    {
        return view('auth/passwords/new-password', ["id"=>$id]);
    }

    /**
     * Password reset view.
     */
    public function setPassword(Request $request)
    {
        $data = $request->only('email', 'password', 'password_confirmation', 'user_id');

        $validator = Validator::make($data, [
            'password' => 'required|string|min:8|max:50|confirmed'
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->first('password') == "The password must be at least 8 characters.") {
                return redirect('/register')->with('message', 'Hasło nie spełnia kryteriów. Spróbuj ponownie!');
            } elseif ($validator->errors()->first('password') == "The password confirmation does not match.") {
                return redirect('/register')->with('message', 'Podane hasła różnią się. Spróbuj ponownie!');
            }
        }

        $user = User::where('email', $request['email'])->first();
        $userID = $user->id;

        if ($userID !== (int)$request->user_id) {
            return redirect('/login')->with('message', 'Wystąpił błąd. Spróbuj ponownie.');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect('/login')->with('success', 'Hasło zostało zresetowane!');;
    }

    /**
     * Log the user out (invalidate the token).
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $request->session()->invalidate();
        $this->productMain();

        return redirect('/');
    }

    /**
     * Delete account.
     */
    public function deleteAccount(Request $request)
    {
        $user = User::find($request->user_id);

        $user->destroy($request->user_id);
        $this->productMain();

        return redirect('/');
    }

    /**
     * Refresh the token
     */
    public function refresh(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json(['token' => $user->createToken($user->name)->plainTextToken]);
    }
}
