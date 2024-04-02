<?php

namespace App\Services\GiphyService;

use App\Contracts\Repositories\GiphyRepository\GiphyRepositoryInterface;
use App\Contracts\Services\GiphyService\GiphyServiceInterface;
use App\DTOs\Giphy\Gif\GetDTO;
use App\DTOs\Giphy\Gif\SearchDTO;

class GiphyService implements GiphyServiceInterface {

    public function __construct(
        protected readonly GiphyRepositoryInterface $giphyRepository
    ) {
        //
    }

    /**
     * @param GetDTO $get
     * @return array
     * @throws RuntimeException
     */
    public function getGifById(GetDTO $get): array {
        return $this->giphyRepository->getGifById($get->id);
    }

    /**
     * @param SearchDTO $search
     * @return array
     * @throws RuntimeException
     */
    public function searchGifs(SearchDTO $search): array {
        return $this->giphyRepository->searchGifs(
            $search->query,
            $search->limit ?? null,
            $search->offset ?? null
        );
    }
}