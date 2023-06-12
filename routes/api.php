<?php

use App\Domain\Auth\Controllers\LoginController;
use App\Domain\Auth\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class)->name('api.register');
Route::post('login', LoginController::class)->name('api.login');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
