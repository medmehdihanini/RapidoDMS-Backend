<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;


class RegistreController extends Controller
{
    public function Registre (RegisterRequest $request)

    {

        $user = User::create([
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        $token = $user->createToken("auth_token")->plainTextToken;
        $expirationTime = 60 * 24 * 30;

        $user->tokens()->orderBy('created_at', 'desc')->first()->update(['expires_at' => now()->addMinutes($expirationTime)]);
        $user = $user->fresh();

        return response()->json([
            'token' => $token,
            'user' => $user,
        ])->cookie('token', $token, $expirationTime);
    }

}
