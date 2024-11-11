<?php

namespace Auth\Infrastructure\Routes;

use Illuminate\Support\Facades\Route;
use SaleManagement\Infrastructure\Controllers\SaleController;

Route::post('/store', [SaleController::class, 'store']);
//    ->middleware(['auth:sanctum', 'role:admin']);
