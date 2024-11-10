<?php

namespace Auth\Infrastructure\Providers;

use Auth\Application\Interfaces\Services\AuthServiceInterface;
use Auth\Application\Services\AuthService;
use Auth\Infrastructure\Interfaces\Repositories\UserRepositoryInterface;
use Auth\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutes();
    }

    /**
     * @return void
     */
    public function loadRoutes(): void
    {
        Route::prefix('api/auth')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
            });
    }
}
