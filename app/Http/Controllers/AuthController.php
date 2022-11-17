<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($input);
        return response()->json(['message' => 'Register is successfully'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($input)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('auth_token')->plainTextToken;
            $data = [
                'message' => 'Login is successfully',
                'token' => $token,
                'user' => $user
            ];
            return response()->json($data, 200);
        } else {
            $data = ['message' => 'Login is invalid'];
            return response()->json($data, 401);
        }
    }

    public function logout(Request $request)
    {
        // Revoke token terakhir yang digunakan untuk login
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout is successfully'], 200);
    }
}
