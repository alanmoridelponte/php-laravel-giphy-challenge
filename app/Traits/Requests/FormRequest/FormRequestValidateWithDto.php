<?php

namespace App\Traits\Requests\FormRequest;

use App\DTOs\BaseDTO;

trait FormRequestValidateWithDto {
    public function validated($key = null, $default = null): BaseDTO {
        return $this->dto::create(
            parent::validated($key, $default)
        );
    }
}