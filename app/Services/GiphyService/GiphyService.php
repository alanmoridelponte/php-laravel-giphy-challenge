<?php

namespace App\Services\GiphyService;

use App\Contracts\Repositories\GiphyRepository\GiphyRepositoryInterface;
use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\Contracts\Services\GiphyService\GiphyServiceInterface;
use App\DTOs\Giphy\Gif\SearchDTO;
use LogicException;

class GiphyService implements GiphyServiceInterface {

    public function __construct(
        protected readonly GiphyRepositoryInterface $giphyRepository,
        protected readonly UserRepositoryInterface $userRepository
    ) {
        //
    }

    public function getGifById(string $id): array {
        return $this->giphyRepository->getGifById($id);
    }

    /**
     * @throws LogicException
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