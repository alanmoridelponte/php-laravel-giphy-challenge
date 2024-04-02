<?php

namespace App\Contracts\Services\GiphyService;

use App\DTOs\Giphy\Gif\SearchDTO;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LogicException;

interface GiphyServiceInterface {

    /**
     * @param string $id
     * @return User
     * @throws ModelNotFoundException
     */
    public function getGifById(string $id): array;

    /**
     * @throws LogicException
     */
    public function searchGifs(SearchDTO $searchDTO): array;

    public function saveUserFavoriteGif(): void;
}