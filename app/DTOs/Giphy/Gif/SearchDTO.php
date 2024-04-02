<?php

namespace App\DTOs\Giphy\Gif;

use App\DTOs\BaseDTO;

class SearchDTO extends BaseDTO {
    public string $query;
    public ?int $limit;
    public ?int $offset;
}