<?php

namespace App\Contracts\Services\GiphyService;

use App\DTOs\Giphy\Gif\GetDTO;
use App\DTOs\Giphy\Gif\SearchDTO;

interface GiphyServiceInterface {

    /**
     * @param GetDTO $get
     * @return array
     * @throws RuntimeException
     */
    public function getGifById(GetDTO $get): array;

    /**
     * @param SearchDTO $search
     * @return array
     * @throws RuntimeException
     */
    public function searchGifs(SearchDTO $search): array;
}