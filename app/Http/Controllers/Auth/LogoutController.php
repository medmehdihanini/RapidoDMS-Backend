<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Helper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        if (!$request->has('email')) {
            return response()->json(["error" => "Email is required!"], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(["error" => "User not found!"], 404);
        }

        if ($user->tokens->isEmpty()) {
            return response()->json(["error" => "No active session found!"], 400);
        }


        $request->user()->currentAccessToken()->delete();
        return Helper::successResponse("Logged out successfully!");
    }
}
