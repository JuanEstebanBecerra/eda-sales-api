<?php

namespace SaleManagement\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Kernel\Infrastructure\Controllers\BaseController;
use SaleManagement\Application\Interfaces\Services\SaleProductServiceInterface;
use SaleManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleManagement\Application\Mappers\SaleNewDtoMapper;
use SaleManagement\Application\Mappers\SaleProductNewDtoMapper;
use Junges\Kafka\Message\Message;
use Junges\Kafka\Facades\Kafka;
use SaleManagement\Infrastructure\Interfaces\EventHandlers\StockVerificationEventHandlerInterface;

class SaleController extends BaseController
{
    /**
     * @var SaleServiceInterface
     */
    private SaleServiceInterface $saleService;

    /**
     * @var SaleProductServiceInterface
     */
    private SaleProductServiceInterface $saleProductService;

    /**
     * @param SaleServiceInterface $saleService
     * @param SaleProductServiceInterface $saleProductService
     */
    public function __construct(
        SaleServiceInterface        $saleService,
        SaleProductServiceInterface $saleProductService)
    {
        $this->saleService = $saleService;
        $this->saleProductService = $saleProductService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'products' => 'required|array|min:1',
            'products.*.productId' => 'required|integer',
            'products.*.amount' => 'required|integer|min:1',
        ]);

        return $this->execWithJsonResponse(function () use ($request) {
            $saleDto = (new SaleNewDtoMapper())
                ->createFromRequest($request);

            $saleDto = $this->saleService
                ->store($saleDto);

            foreach ($request->products as $product) {
                $productDto = (new SaleProductNewDtoMapper())
                    ->createFromArray($product);

                $productDto->saleId = $saleDto->id;

                $this->saleProductService
                    ->store($productDto);
            }

            (App::make(StockVerificationEventHandlerInterface::class))
                ->sendMessage([
                    'action' => 'stock_verification',
                    'data' => [
                        'saleId' => $saleDto->id,
                        'products' => $request->products
                    ]
                ]);

            return [
                'message' => 'Pedido realizada exitosamente'
            ];
        });
    }
}
