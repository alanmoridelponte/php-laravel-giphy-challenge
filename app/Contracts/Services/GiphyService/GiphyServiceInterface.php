<?php

namespace App\Contracts\Services\GiphyService;

use App\DTOs\Giphy\Gif\SearchDTO;

interface GiphyServiceInterface {

    /**
     * @param string $id
     * @return array
     * @throws RuntimeException
     */
    public function getGifById(string $id): array;

    /**
     * @param SearchDTO $search
     * @return array
     * @throws RuntimeException
     */
    public function searchGifs(SearchDTO $search): array;

    public function saveUserFavoriteGif(): void;
}