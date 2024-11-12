<?php

namespace SaleManagement;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use SaleManagement\Application\Interfaces\Services\SaleProductServiceInterface;
use SaleManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleManagement\Application\Services\SaleProductService;
use SaleManagement\Application\Services\SaleService;
use SaleManagement\Infrastructure\EventHandlers\StockVerificationEventHandler;
use SaleManagement\Infrastructure\Interfaces\EventHandlers\StockVerificationEventHandlerInterface;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleProductRepositoryInterface;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleRepositoryInterface;
use SaleManagement\Infrastructure\Repositories\SaleProductRepository;
use SaleManagement\Infrastructure\Repositories\SaleRepository;

class SaleManagementServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SaleServiceInterface::class, SaleService::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
        $this->app->bind(SaleProductServiceInterface::class, SaleProductService::class);
        $this->app->bind(SaleProductRepositoryInterface::class, SaleProductRepository::class);
        $this->app->bind(StockVerificationEventHandlerInterface::class, StockVerificationEventHandler::class);
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
        Route::prefix('api')
            ->group(function () {
                $this->loadRoutesFrom(__DIR__ . '/Infrastructure/Routes/api.php');
            });
    }
}
