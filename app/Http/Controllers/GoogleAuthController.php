<?php


namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }



    public function handleGoogleCallback()
    {
        try {
            // Get the data from google account
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(str()->random(16)), // Génère un mot de passe aléatoire
                'role' => "user",
                'status' => "active",
            ]);

            $token = $user->createToken('API_With_GoogleAuth')->plainTextToken;

            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de l’authentification Google.',$e], 500);
        }
    }

}

