<?php

namespace App\Services\UserFavoriteGiphyGifService;

use App\Contracts\Repositories\UserFavoriteGiphyGifRepository\UserFavoriteGiphyGifRepositoryInterface;
use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\Contracts\Services\UserFavoriteGiphyGifServiceInterface\UserFavoriteGiphyGifServiceInterface;
use App\DTOs\UserFavoriteGiphyGif\SaveFavoriteDTO;
use App\Exceptions\DuplicateEntryException;
use App\Models\UserFavoriteGiphyGif;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UserFavoriteGiphyGifService implements UserFavoriteGiphyGifServiceInterface {

    public function __construct(
        protected readonly UserRepositoryInterface $userRepository,
        protected readonly UserFavoriteGiphyGifRepositoryInterface $userFavoriteGiphyGifRepository
    ) {
        //
    }

    /**
     * @param SaveFavoriteDTO $favorite
     * @return void
     * @throws ModelNotFoundException|QueryException|DuplicateEntryException
     */
    public function saveUserFavoriteGif(SaveFavoriteDTO $favorite): UserFavoriteGiphyGif {
        $this->userRepository->findById($favorite->user_id);

        try {
            return $this->userFavoriteGiphyGifRepository->create($favorite);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                throw new DuplicateEntryException("User's favortie giphy gif already exist.");
            }

            throw $e;
        }
    }
}