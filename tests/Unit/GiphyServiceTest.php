<?php

namespace Tests\Unit;

use App\DTOs\Giphy\Gif\SearchDTO;
use App\Repositories\GiphyRepository\GiphyRepository;
use App\Repositories\UserRepository\UserRepository;
use App\Services\GiphyService\GiphyService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GiphyServiceTest extends TestCase {
    protected $giphyService;

    public function setUp(): void {
        parent::setUp();

        $client = Http::withOptions([
            'base_uri' => "https://api.giphy.com/v1/",
            'query' => [
                'api_key' => "NY78v3EZcP4gObSjR9OSsGk2CCmsAFjJ",
            ],
        ]);
        $this->giphyService = new GiphyService(new GiphyRepository($client), app(UserRepository::class));

    }

    /** @test */
    public function it_can_search_gif_by_id() {
        $response = $this->giphyService->getGifById("mlvseq9yvZhba");
        $this->assertTrue($response["meta"]["status"] === 200);
    }

    /** @test */
    public function it_can_search_gifs_by_query() {
        $search = new SearchDTO();
        $search->query = 'cats';
        $search->limit = 10;
        $search->offset = 0;

        $response = $this->giphyService->searchGifs($search);

        $this->assertTrue($response["meta"]["status"] === 200);
    }
}