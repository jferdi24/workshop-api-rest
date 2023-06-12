<?php

use App\Domain\Auth\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', RegisterController::class)->name('api.register');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
