<?php

namespace App\DTOs\User;

use App\DTOs\BaseDTO;

class LoginUserDTO extends BaseDTO {
    public string $email;
    public string $password;
}