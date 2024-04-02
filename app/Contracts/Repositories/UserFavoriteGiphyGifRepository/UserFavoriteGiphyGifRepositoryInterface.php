<?php

namespace App\Contracts\Repositories\UserFavoriteGiphyGifRepository;

use App\DTOs\UserFavoriteGiphyGif\SaveFavoriteDTO;
use App\Models\UserFavoriteGiphyGif;

interface UserFavoriteGiphyGifRepositoryInterface {

    public function create(SaveFavoriteDTO $favorite): UserFavoriteGiphyGif;

    public function findByGifIdAndAliasAndUserId(string $gif_id, string $alias, int $user_id): UserFavoriteGiphyGif;
}