<?php

namespace App\Traits\Requests\FormRequest;

use App\DTOs\BaseDTO;
use RuntimeException;

trait FormRequestValidateWithDto {
    public function validated($key = null, $default = null): BaseDTO {

        if (!property_exists($this, 'dto') || !is_subclass_of($this->dto, BaseDTO::class)) {
            throw new RuntimeException('DTO property is missing or is not an instance of BaseDTO');
        }

        return $this->dto::create(
            parent::validated($key, $default)
        );
    }
}