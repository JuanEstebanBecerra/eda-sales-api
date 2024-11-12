<?php

namespace SaleValidationManagement\Infrastructure\Interfaces\EventHandlers;

interface SaleValidationEventHandlerInterface
{
    /**
     * @param array $message
     * @return void
     */
    public function onGetMessage(array $message): void;
}
