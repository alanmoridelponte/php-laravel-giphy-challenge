<?php

namespace App\Contracts\Repositories\UserRepository;

use App\DTO\User\RegisterUserDTO;
use App\Models\User;

interface UserRepositoryInterface {

    public function create(RegisterUserDTO $userDTO): User;

    public function findByEmail(string $email): User;

}