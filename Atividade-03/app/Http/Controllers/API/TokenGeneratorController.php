<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class TokenGeneratorController extends Controller
{
    public function __invoke()
    {
        $tokens = [];
        foreach (User::all() as $user) {
            $user->tokens()->delete();
            $token = $user->createToken('token-name')->plainTextToken;
            $tokens[] = [
                'name' => $user->name,
                'token' => $token,
            ];
            $user->token = $token;
            $user->save();
        }
        return $tokens;
    }
}
