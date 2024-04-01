<?php

namespace Tests\Unit;

use App\DTOs\User\RegisterUserDTO;
use App\Models\User;
use App\Services\UserService\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase {
    use RefreshDatabase;

    protected $userService;

    public function setUp(): void {
        parent::setUp();

        $this->userService = app(UserService::class);
    }

    /** @test */
    public function it_can_find_user_by_email(): void {
        $userA = User::factory()->create();
        $userB = $this->userService->findByEmail($userA->email);

        $this->assertTrue($userA->id === $userB->id);
    }

    /** @test */
    public function it_can_create_user(): void {
        $userA = $this->userService->create(RegisterUserDTO::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
        ]));
        $userB = $this->userService->findByEmail($userA->email);

        $this->assertTrue($userA->id === $userB->id);
    }

}