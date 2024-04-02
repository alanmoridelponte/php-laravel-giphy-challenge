<?php

namespace Tests\Unit;

use App\DTOs\Giphy\Gif\GetDTO;
use App\DTOs\Giphy\Gif\SearchDTO;
use App\Services\GiphyService\GiphyService;
use Tests\TestCase;

class GiphyServiceTest extends TestCase {
    protected $giphyService;

    public function setUp(): void {
        parent::setUp();

        $this->giphyService = app(GiphyService::class);
    }

    /** @test */
    public function it_can_search_gif_by_id() {
        $get = new GetDTO();
        $get->id = "mlvseq9yvZhba";

        $response = $this->giphyService->getGifById($get);

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