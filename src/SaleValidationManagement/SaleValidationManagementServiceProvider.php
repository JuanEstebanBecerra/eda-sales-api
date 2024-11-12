<?php

namespace SaleValidationManagement;

use Illuminate\Support\ServiceProvider;
use SaleValidationManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleValidationManagement\Application\Services\SaleService;
use SaleValidationManagement\Infrastructure\EventHandlers\SaleValidationEventHandler;
use SaleValidationManagement\Infrastructure\Interfaces\EventHandlers\SaleValidationEventHandlerInterface;
use SaleValidationManagement\Infrastructure\Interfaces\Repositories\SaleRepositoryInterface;
use SaleValidationManagement\Infrastructure\Repositories\SaleRepository;

class SaleValidationManagementServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SaleServiceInterface::class, SaleService::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
        $this->app->bind(SaleValidationEventHandlerInterface::class, SaleValidationEventHandler::class);
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
