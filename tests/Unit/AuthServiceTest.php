<?php

namespace Tests\Unit;

use App\DTOs\User\LoginUserDTO;
use App\Models\User;
use App\Services\AuthService\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthServiceTest extends TestCase {
    use RefreshDatabase;

    protected $authService;

    public function setUp(): void {
        parent::setUp();

        $this->authService = app(AuthService::class);

        Artisan::call('passport:install');
    }

    /** @test */
    public function it_can_attempt_login() {

        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $credentials = LoginUserDTO::create([
            'email' => $user->email,
            'password' => 'password123',
        ]);

        $this->assertTrue($this->authService->attemptLogin($credentials));
    }

    /** @test */
    public function it_can_generate_access_token() {
        $user = User::factory()->create();
        Auth::login($user);

        $accessToken = $this->authService->generateAccessToken(Auth::user());

        $this->assertNotEmpty($accessToken);
    }
}