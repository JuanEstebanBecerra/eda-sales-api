<?php

namespace SaleValidationManagement\Infrastructure\EventHandlers;

use Carbon\Exceptions\Exception;
use Junges\Kafka\Contracts\ConsumerMessage;
use Junges\Kafka\Contracts\MessageConsumer;
use Junges\Kafka\Exceptions\ConsumerException;
use Junges\Kafka\Facades\Kafka;
use SaleValidationManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleValidationManagement\Infrastructure\Interfaces\EventHandlers\SaleValidationEventHandlerInterface;

class SaleValidationEventHandler implements SaleValidationEventHandlerInterface
{
    private SaleServiceInterface $saleService;

    /**
     * @param SaleServiceInterface $saleService
     * @throws ConsumerException
     * @throws Exception
     * @throws \RdKafka\Exception
     */
    public function __construct(SaleServiceInterface $saleService)
    {
        $this->saleService = $saleService;
        $this->setupConsumer();
    }

    /**
     * @return void
     * @throws ConsumerException
     * @throws Exception
     * @throws \RdKafka\Exception
     */
    private function setupConsumer(): void
    {
        $consumer = Kafka::consumer()
            ->subscribe('sale_validation')
            ->withHandler(function (ConsumerMessage $message, MessageConsumer $consumer) {
                $this->onGetMessage($message->getBody());
            })->build();


        $consumer->consume();
    }

    /**
     * @param array $message
     * @return void
     */
    public function onGetMessage(array $message): void
    {
        $this->saleService
            ->updateIsValid(
                $message['data']['saleId'],
                $message['data']['isValid']);
    }
}
