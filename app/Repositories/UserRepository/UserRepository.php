<?php

namespace App\Repositories\UserRepository;

use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\DTO\User\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface {

    public function __construct(
        private readonly User $user
    ) {
        //
    }

    public function create(RegisterUserDTO $userDTO): User {
        return $this->user->newQuery()
            ->create([
                'name' => $userDTO->name,
                'email' => $userDTO->email,
                'password' => Hash::make($userDTO->password),
            ]);
    }

    public function findByEmail(string $email): User {
        return $this->user->newQuery()
            ->where('email', '=', $email)
            ->firstOrFail();
    }
}