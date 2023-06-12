<?php

namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        return response()->json([
            'message' => trans('auth.user_created_message'),
            'user' => $user->only(['name', 'email']),
        ], 201);
    }
}
