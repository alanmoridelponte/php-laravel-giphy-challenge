<?php

namespace App\Contracts\Repositories\GiphyRepository;

interface GiphyRepositoryInterface {

    public function getGifById(string $id): array;

    public function searchGifs(string $query, ?int $limit = 10, ?int $offset = 0): array;
}