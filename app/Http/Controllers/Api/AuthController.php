<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registration(RegisterRequest $request)
    {
        $password = Hash::make($request->password);
        User::query()->create(['password' => $password] + $request->validated());

        return response()->json([
            'succes' => true,
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return [
                'succes' => true,
                'token' => $request->user()->createToken('api')->plainTextToken,
            ];
        }

        return response()->json([
            'succes' => false,
            'error' => 'incorrect login or password' 
        ], 422);
    }

    public function logout(Request $request) 
    {
        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
