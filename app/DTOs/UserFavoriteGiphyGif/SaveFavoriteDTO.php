<?php

namespace App\DTOs\UserFavoriteGiphyGif;

use App\DTOs\BaseDTO;

class SaveFavoriteDTO extends BaseDTO {
    public string $gif_id;
    public string $alias;
    public int $user_id;
}