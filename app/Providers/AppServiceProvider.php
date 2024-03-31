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
    /**
     * Register any application services.
     */
    public function register(): void {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        //
    }
}