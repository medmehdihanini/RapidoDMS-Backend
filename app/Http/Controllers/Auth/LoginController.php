<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Helpers\Helper;



class LoginController extends Controller
{
    public function login(LoginRequest  $request)
    {
    $user=User::where('email',$request->email)->first();
    error_log($user);
    if(Hash::check($request->password,$user->password)){
        $token = $user->createToken('login_token')->plainTextToken;
        $expirationTime = 60 * 24 * 30;
            $user->tokens()->orderBy('created_at', 'desc')->first()->update(['expires_at' => now()->addMinutes($expirationTime)]);
            $user = $user->fresh();

            // return token, details with cookie
            return response()->json([
                'token' => $token,
                'user' => $user,
            ])->cookie('token', $token, $expirationTime);
        }

        return Helper::errorResponse('Invalid credentials');
    }

}
