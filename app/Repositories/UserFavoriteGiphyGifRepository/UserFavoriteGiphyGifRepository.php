<?php

namespace App\Repositories\UserFavoriteGiphyGifRepository;

use App\Contracts\Repositories\UserFavoriteGiphyGifRepository\UserFavoriteGiphyGifRepositoryInterface;
use App\DTOs\UserFavoriteGiphyGif\SaveFavoriteDTO;
use App\Models\UserFavoriteGiphyGif;

class UserFavoriteGiphyGifRepository implements UserFavoriteGiphyGifRepositoryInterface {

    public function __construct(
        private readonly UserFavoriteGiphyGif $userFavoriteGiphyGif
    ) {
        //
    }

    public function create(SaveFavoriteDTO $favorite): UserFavoriteGiphyGif {
        return $this->userFavoriteGiphyGif->newQuery()
            ->create([
                'gif_id' => $favorite->gif_id,
                'alias' => $favorite->alias,
                'user_id' => $favorite->user_id,
            ]);
    }

    public function findByGifIdAndAliasAndUserId(string $gif_id, string $alias, int $user_id): UserFavoriteGiphyGif {
        return $this->userFavoriteGiphyGif->newQuery()
            ->where('gif_id', '=', $gif_id)
            ->where('alias', '=', $alias)
            ->where('user_id', '=', $user_id)
            ->firstOrFail();
    }
}