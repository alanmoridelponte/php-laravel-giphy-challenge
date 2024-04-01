<?php

namespace App\DTOs\User;

use App\DTOs\BaseDTO;

class RegisterUserDTO extends BaseDTO {
    public string $email;
    public string $name;
    public string $password;
}