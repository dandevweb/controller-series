<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return response()->json([
                'token' => auth()->user()->createToken('token', ['series:delete'])->plainTextToken
            ]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);

    }
}