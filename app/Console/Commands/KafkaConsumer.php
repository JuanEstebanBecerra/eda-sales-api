<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use SaleValidationManagement\Infrastructure\Interfaces\EventHandlers\SaleValidationEventHandlerInterface;

class KafkaConsumer extends Command
{
    protected $signature = 'kafka:consume-1';
    protected $description = 'Consume messages from Kafka topics';

    /**
     * @return void
     */
    public function handle()
    {
        App::make(SaleValidationEventHandlerInterface::class);
    }
}
