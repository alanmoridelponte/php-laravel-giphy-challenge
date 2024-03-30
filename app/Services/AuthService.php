<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {
    public function attemptLogin(array $credentials): bool {
        return Auth::attempt($credentials);
    }

    public function generateAccessToken(User $user): string {
        return $user->createToken('authToken')->accessToken;
    }

    public function register(array $data): User {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}