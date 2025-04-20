<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = JWTAuth::attempt($credentials);

        if (!$token) {

            return response()->json(
                [
                    'error' => 'Unauthorized'
                ], 401
            );

        }

        return response()->json(
            [
                'token' => $token,
                'token_type' => 'bearer',
                'user' => '',//?empty
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ], 200
        );
    }

    public function profile()
    {
        return response()->json(
            auth('api')->user()
        );
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function refresh()
    {
        return response()->json(
            [
                'token' => auth('api')->refresh(),
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        );
    }
}
