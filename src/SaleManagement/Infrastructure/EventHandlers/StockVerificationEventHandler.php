<?php

namespace SaleManagement\Infrastructure\EventHandlers;

use Exception;
use Junges\Kafka\Facades\Kafka;
use Junges\Kafka\Message\Message;
use SaleManagement\Infrastructure\Interfaces\EventHandlers\StockVerificationEventHandlerInterface;

class StockVerificationEventHandler implements StockVerificationEventHandlerInterface
{
    /**
     * @param array $message
     * @return void
     * @throws Exception
     */
    public function sendMessage(array $message): void
    {
        $message = new Message(
            body: $message,
        );

        Kafka::asyncPublish()
            ->onTopic('stock_verification')
            ->withMessage($message)
            ->send();
    }
}
