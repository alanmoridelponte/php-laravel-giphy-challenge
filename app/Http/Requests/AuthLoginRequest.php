<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest {
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