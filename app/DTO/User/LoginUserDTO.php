<?php

namespace App\DTO\User;

use App\DTO\BaseDTO;

class LoginUserDTO extends BaseDTO {
    public string $email;
    public string $password;
}