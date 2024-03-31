<?php

namespace App\Services\UserService;

use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\Contracts\Services\UserService\UserServiceInterface;
use App\DTO\User\RegisterUserDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;

class UserService implements UserServiceInterface {

    public function __construct(
        protected readonly UserRepositoryInterface $userRepository
    ) {
        //
    }
    /**
     * @param string $email
     * @return User
     * @throws ModelNotFoundException
     */
    public function findByEmail(string $email): User {
        return $this->userRepository->findByEmail($email);
    }

    /**
     * @throws LogicException
     */
    public function create(RegisterUserDTO $userDTO): User {
        try {
            $this->findByEmail($userDTO->email);
            throw new LogicException('User with this email already exists!');
        } catch (ModelNotFoundException $e) {
            //
        }

        return $this->userRepository->create($userDTO);
    }

}