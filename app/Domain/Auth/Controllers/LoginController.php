<?php

namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => trans('auth.failed'),
            ], 422);
        }

        $user = User::query()->where('email', $request->get('email'))->first();
        $token = $user->createToken(Str::random())->plainTextToken;

        return response()->json([
            'access_token' => $token,
        ]);
    }
}
