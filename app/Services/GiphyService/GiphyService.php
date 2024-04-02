<?php

namespace App\Services\GiphyService;

use App\Contracts\Repositories\GiphyRepository\GiphyRepositoryInterface;
use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\Contracts\Services\GiphyService\GiphyServiceInterface;
use App\DTOs\Giphy\Gif\SearchDTO;

class GiphyService implements GiphyServiceInterface {

    public function __construct(
        protected readonly GiphyRepositoryInterface $giphyRepository,
        protected readonly UserRepositoryInterface $userRepository
    ) {
        //
    }

    /**
     * @param string $id
     * @return array
     * @throws RuntimeException
     */
    public function getGifById(string $id): array {
        return $this->giphyRepository->getGifById($id);
    }

    /**
     * @param SearchDTO $search
     * @return array
     * @throws RuntimeException
     */
    public function searchGifs(SearchDTO $search): array {
        return $this->giphyRepository->searchGifs(
            $search->query,
            $search->limit,
            $search->offset
        );
    }

    public function saveUserFavoriteGif(): void {
        //
    }

}