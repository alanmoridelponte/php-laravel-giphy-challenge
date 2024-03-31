<?php

namespace App\DTO\User;

use App\DTO\BaseDTO;

class RegisterUserDTO extends BaseDTO {
    public string $email;
    public string $name;
    public string $password;
}