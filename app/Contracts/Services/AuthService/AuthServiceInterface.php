<?php

namespace App\Contracts\Services\AuthService;

use App\DTOs\User\LoginUserDTO;
use App\DTOs\User\RegisterUserDTO;
use App\Models\User;

interface AuthServiceInterface {

    public function attemptLogin(LoginUserDTO $data): bool;

    public function generateAccessToken(User $user): string;

    public function register(RegisterUserDTO $data): User;
}