<?php

namespace App\Providers;

use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\Contracts\Services\AuthService\AuthServiceInterface;
use App\Contracts\Services\UserService\UserServiceInterface;
use App\Repositories\UserRepository\UserRepository;
use App\Services\AuthService\AuthService;
use App\Services\UserService\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    public function boot(): void {
        //
    }
}