<?php

namespace App\DTOs;

class BaseDTO {
    public static function create(array $data): self {
        $instance = new static();
        foreach ($data as $key => $value) {
            if (property_exists($instance, $key)) {
                $instance->$key = $value;
            }
        }

        return $instance;
    }

    public function toArray(): array {
        return get_object_vars($this);
    }
}