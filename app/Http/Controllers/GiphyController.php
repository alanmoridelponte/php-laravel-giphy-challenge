<?php
namespace App\Http\Controllers;

use App\Contracts\Services\GiphyService\GiphyServiceInterface;
use App\Http\Requests\GiphyGetRequest;
use App\Http\Requests\GiphySearchRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GiphyController extends Controller {

    public function __construct(
        protected GiphyServiceInterface $giphyService
    ) {
        //
    }

    public function searchGifs(GiphySearchRequest $request): JsonResponse {
        $data = $this->giphyService->searchGifs($request->validated());

        return new JsonResponse(
            data: $data,
            status: Response::HTTP_OK,
        );
    }

    public function getGifById(GiphyGetRequest $request): JsonResponse {
        $data = $this->giphyService->getGifById($request->validated());

        return new JsonResponse(
            data: $data,
            status: Response::HTTP_OK,
        );
    }
}