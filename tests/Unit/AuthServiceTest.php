<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthServiceTest extends TestCase {
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        Artisan::call('passport:install');
    }

    public function it_can_attempt_login() {

        $user = User::factory()->create([
            'password' => bcrypt('password123'),
        ]);

        $credentials = ['email' => $user->email, 'password' => 'password123'];

        $service = new AuthService();

        $this->assertTrue($service->attemptLogin($credentials));
    }

    /** @test */
    public function it_can_generate_access_token() {
        $user = User::factory()->create();

        Auth::login($user);

        $service = new AuthService();

        $accessToken = $service->generateAccessToken(Auth::user());

        $this->assertNotEmpty($accessToken);
    }
}