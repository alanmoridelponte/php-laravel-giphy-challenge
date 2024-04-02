<?php

namespace App\Providers;

use App\Contracts\Repositories\GiphyRepository\GiphyRepositoryInterface;
use App\Contracts\Repositories\UserRepository\UserRepositoryInterface;
use App\Contracts\Services\AuthService\AuthServiceInterface;
use App\Contracts\Services\GiphyService\GiphyServiceInterface;
use App\Contracts\Services\UserService\UserServiceInterface;
use App\Repositories\GiphyRepository\GiphyRepository;
use App\Repositories\UserRepository\UserRepository;
use App\Services\AuthService\AuthService;
use App\Services\GiphyService\GiphyService;
use App\Services\UserService\UserService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    public function register(): void {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(GiphyRepositoryInterface::class, function () {
            return new GiphyRepository(Http::withOptions([
                'base_uri' => Config::get('giphy.api.base_url'),
                'query' => [
                    'api_key' => Config::get('giphy.api.key'),
                ],
            ]));
        });
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(GiphyServiceInterface::class, GiphyService::class);
    }

    public function boot(): void {
        //
    }
}