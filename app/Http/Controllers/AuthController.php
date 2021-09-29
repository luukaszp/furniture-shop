<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use App\Models\Product;
use Validator;

class AuthController extends Controller
{
    /**
     * Display login view.
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    public function login()
    {
        return view('auth/login');
    }

    /**
     * Display register view.
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    public function register()
    {
        return view('auth/register');
    }

    public function registerUser(Request $request)
    {
        //Validate data
        $data = $request->only('name', 'surname', 'email', 'address', 'zip_code', 'city', 'province', 'phone_number', 'password', 'password_confirmation');

        $validator = Validator::make($data, [
            'name' => 'required|string|max:15',
            'surname' => 'required|string|max:30',
            'email' => 'required|email|max:60|unique:users',
            'address' => 'required|string|max:80',
            'zip_code' => 'required|string|max:6',
            'city' => 'required|string|max:20',
            'province' => 'required|string|max:30',
            'phone_number' => 'required|string|max:10',
            'password' => 'required|string|min:8|max:50|confirmed'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'province' => $request->province,
            'phone_number' => $request->phone_number,
            'password' => bcrypt($request->password)
        ]);

        $role = new Role();
        $role->user_id = $user->id;
        $role->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return redirect('/login');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        $this->productMain();

        return redirect('/');
    }

    /**
     * Get products to display in main page.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function productMain()
    {
        $products = Product::select('id', 'name', 'photo', 'price')->paginate(9);
        return view('main', compact('products'));
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $request->session()->invalidate();
        $this->productMain();

        return redirect('/');
    }

    public function refresh(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json(['token' => $user->createToken($user->name)->plainTextToken]);
    }
}
