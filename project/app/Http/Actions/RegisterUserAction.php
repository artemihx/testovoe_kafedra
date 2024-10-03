<?php

namespace App\Http\Actions;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserAction
{
    public static function execute(RegisterRequest $request): string
    {
        $user = new User([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'patronymic' => $request->get('patronymic'),
            'email' => $request->get('email'),
            'password'=> Hash::make($request->get('password'))
        ]);
        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}
