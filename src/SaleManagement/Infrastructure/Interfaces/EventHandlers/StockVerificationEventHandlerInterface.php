<?php

namespace SaleManagement\Infrastructure\Interfaces\EventHandlers;

use Exception;

interface StockVerificationEventHandlerInterface
{
    /**
     * @param array $message
     * @return void
     * @throws Exception
     */
    public function sendMessage(array $message): void;
}
