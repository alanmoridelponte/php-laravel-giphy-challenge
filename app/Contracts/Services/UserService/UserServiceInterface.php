<?php

namespace App\Contracts\Services\UserService;

use App\DTOs\User\RegisterUserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;

interface UserServiceInterface {

    /**
     * @param string $email
     * @return User
     * @throws ModelNotFoundException
     */
    public function findByEmail(string $email): User;

    /**
     * @throws LogicException
     */
    public function create(RegisterUserDTO $userDTO): User;

}