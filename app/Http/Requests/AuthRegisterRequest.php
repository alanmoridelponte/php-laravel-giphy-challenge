<?php

namespace App\Http\Requests;

use App\DTO\User\RegisterUserDTO;
use App\Traits\Requests\FormRequest\FormRequestValidateWithDto;
use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest {
    use FormRequestValidateWithDto;

    protected $dto = RegisterUserDTO::class;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];
    }
}