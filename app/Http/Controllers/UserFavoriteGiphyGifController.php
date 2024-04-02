<?php
namespace App\Http\Controllers;

use App\Contracts\Services\UserFavoriteGiphyGifServiceInterface\UserFavoriteGiphyGifServiceInterface;
use App\Exceptions\DuplicateEntryException;
use App\Http\Requests\UserFavoriteGiphyGifSaveRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserFavoriteGiphyGifController extends Controller {

    public function __construct(
        protected UserFavoriteGiphyGifServiceInterface $userFavoriteGiphyGifService
    ) {
        //
    }

    /**
     * @useService App\Services\UserFavoriteGiphyGifService\UserFavoriteGiphyGifService
     */
    public function saveUserFavoriteGif(UserFavoriteGiphyGifSaveRequest $request): JsonResponse {
        try {
            $this->userFavoriteGiphyGifService->saveUserFavoriteGif($request->validated());
        } catch (DuplicateEntryException $e) {
            return new JsonResponse(
                data: [
                    'message' => $e->getMessage(),
                ],
                status: Response::HTTP_CONFLICT,
            );
        } catch (ModelNotFoundException $e) {
            return new JsonResponse(
                data: [
                    'message' => $e->getMessage(),
                ],
                status: Response::HTTP_NOT_FOUND,
            );
        }

        return new JsonResponse(
            status: Response::HTTP_OK,
        );
    }
}