<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        $user->assignRole('user');

        $tokenData = $this->generateToken($user);

        return response()->json(
            [
                'message' => 'User registered successfully.',
                'access_token' => $tokenData['token'],
                'token_type' => 'Bearer',
                'expires_at' => $tokenData['expires_at'],
                'user' => $user,
            ], 201
        );
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    'message' => 'The provided credentials are incorrect.',
                    'error' => 'Unauthorized'
                ], 401
            );
        }

        $tokenData = $this->generateToken($user);

        return response()->json(
            [
                'message' => 'Logged in successfully.',
                'access_token' => $tokenData['token'],
                'token_type' => 'Bearer',
                'expires_at' => $tokenData['expires_at'],
                'user' => $user,
            ], 200
        );
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(
            [
                'message' => 'Logged out successfully.'
            ], 200
        );
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(
            [
                'message' => 'Logged out from all devices.'
            ], 200
        );
    }

    protected function generateToken(User $user): array
    {
        $tokenResult = $user->createToken('API Token', ['*'], now()->addDays(1)); // Expires in 1 day

        return [
            'token' => $tokenResult->accessToken,
            'expires_at' => $tokenResult->token->expires_at,
        ];
    }
}
