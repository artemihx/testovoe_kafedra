<?php

namespace App\Http\Actions;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JsonException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LoginUserAction
{
    public static function execute(LoginRequest $request): string
    {
        $user = User::query()->where('email', '=', $request->get('email'))->first();
        if(!$user || !Hash::check($request->get('password'), $user->password))
        {
            throw new HttpException(401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
