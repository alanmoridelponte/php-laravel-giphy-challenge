<?php

namespace App\Contracts\Services\UserFavoriteGiphyGifServiceInterface;

use App\DTOs\UserFavoriteGiphyGif\SaveFavoriteDTO;
use App\Models\UserFavoriteGiphyGif;

interface UserFavoriteGiphyGifServiceInterface {

    /**
     * @param SaveFavoriteDTO $favorite
     * @return void
     * @throws LogicException|ModelNotFoundException
     */
    public function saveUserFavoriteGif(SaveFavoriteDTO $favorite): UserFavoriteGiphyGif;
}