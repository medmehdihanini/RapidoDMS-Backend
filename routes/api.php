<?php

use App\Http\Controllers\GoogleAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::post('register', [RegistreController::class, 'Registre']);
Route::post('login', [LoginController::class, 'login']);

// google auth
Route::middleware(['web'])->group(function () {
    Route::get('auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
});
//protected route
Route::middleware('auth:sanctum')->group(function () {

    Route::post('logout', [LogoutController::class, 'logout']);


});
