<?php

namespace App\Http\Requests;

use App\DTO\User\LoginUserDTO;
use App\Traits\Requests\FormRequest\FormRequestValidateWithDto;
use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest {
    use FormRequestValidateWithDto;

    protected $dto = LoginUserDTO::class;

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}