<?php
namespace App\Services\AuthService;

use App\Contracts\Services\AuthService\AuthServiceInterface;
use App\Contracts\Services\UserService\UserServiceInterface;
use App\DTO\User\LoginUserDTO;
use App\DTO\User\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface {

    public function __construct(
        protected readonly UserServiceInterface $userService
    ) {
        //
    }

    public function attemptLogin(LoginUserDTO $data): bool {
        return Auth::attempt([
            'email' => $data->email,
            'password' => $data->password,
        ]);
    }

    public function generateAccessToken(User $user): string {
        return $user->createToken('authToken')->accessToken;
    }

    public function register(RegisterUserDTO $data): User {
        return $this->userService->create($data);
    }
}