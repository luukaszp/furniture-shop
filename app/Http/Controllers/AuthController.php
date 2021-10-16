<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordReset;
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
     * Register user.
     */

    public function registerUser(RegisterRequest $request)
    {
        if ($request->validated()) {
            $result = $this->authServices->register($request);
            return redirect('/login');
        }
    }

    /**
     * Login user with product compact.
     */
    public function loginUser(LoginRequest $request)
    {
        if ($request->validated()) {
            if (!Auth::attempt($request->only('email', 'password'))) {
                $message = 'Zły e-mail lub hasło.';
                return view('auth.login', ['message' => $message]);
            }

            $token = $this->authServices->login($request);
            $this->productMain();

            return redirect('/');
        }
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

        return redirect('login')->with('success', 'Link do zresetowania hasła został wysłany na e-mail!');
    }

    /**
     * Password reset view.
     */
    public function newPassword($id)
    {
        return view('auth/passwords/new-password', ["id" => $id]);
    }

    /**
     * Password reset view.
     */
    public function setPassword(PasswordReset $request)
    {
        if ($request->validated()) {
            $result = $this->authServices->passwordReset($request);
            return redirect('login')->with('success', 'Hasło zostało zresetowane!');
        }
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

        return response()->json(['token' => $user->createToken($user->name)->accessToken]);
    }
}
