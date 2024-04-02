<?php

namespace Tests\Unit;

use App\DTOs\UserFavoriteGiphyGif\SaveFavoriteDTO;
use App\Models\User;
use App\Services\UserFavoriteGiphyGifService\UserFavoriteGiphyGifService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFavoriteGiphyGifServiceTest extends TestCase {
    use RefreshDatabase;

    protected $userFavoriteGiphyGifService;

    public function setUp(): void {
        parent::setUp();

        $this->userFavoriteGiphyGifService = app(UserFavoriteGiphyGifService::class);
    }

    /** @test */
    public function it_can_save_users_favorite_giphy_gif(): void {
        $user = User::factory()->create();

        $favorite = new SaveFavoriteDTO();
        $favorite->gif_id = 'test_id';
        $favorite->alias = 'test';
        $favorite->user_id = $user->id;

        $userFavoriteGiphyGifModel = $this->userFavoriteGiphyGifService->saveUserFavoriteGif($favorite);

        $this->assertTrue(
            $userFavoriteGiphyGifModel->gif_id === $favorite->gif_id
            && $userFavoriteGiphyGifModel->alias === $favorite->alias
            && $userFavoriteGiphyGifModel->user_id === $user->id
        );
    }

}