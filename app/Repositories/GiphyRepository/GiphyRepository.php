<?php

namespace App\Repositories\GiphyRepository;

use App\Contracts\Repositories\GiphyRepository\GiphyRepositoryInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use RuntimeException;

class GiphyRepository implements GiphyRepositoryInterface {

    const GET_BY_ID_GIF_ENDPOINT = "gifs";
    const SEARCH_GIF_ENDPOINT = "gifs/search";

    public function __construct(
        private readonly PendingRequest $client
    ) {
        //
    }

    public function getGifById(string $id): array {
        try {
            $response = $this->client->get(self::GET_BY_ID_GIF_ENDPOINT . "/{$id}");

            return $response->json();
        } catch (RequestException $e) {
            throw new RuntimeException("Failed to fetch GIF from Giphy API: {$e->getMessage()}");
        }
    }

    public function searchGifs(string $query, ?int $limit = 10, ?int $offset = 0): array {
        try {
            $response = $this->client->get(self::SEARCH_GIF_ENDPOINT, [
                'q' => $query,
                'limit' => $limit,
                'offset' => $offset,
            ]);

            return $response->json();
        } catch (RequestException $e) {
            throw new RuntimeException("Failed to fetch GIFs from Giphy API: {$e->getMessage()}");
        }
    }
}