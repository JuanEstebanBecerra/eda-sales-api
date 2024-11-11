<?php

namespace SaleManagement\Infrastructure\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kernel\Infrastructure\Controllers\BaseController;
use SaleManagement\Application\Interfaces\Services\SaleProductServiceInterface;
use SaleManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleManagement\Application\Mappers\SaleNewDtoMapper;
use SaleManagement\Application\Mappers\ProductUpdateDtoMapper;
use SaleManagement\Application\Mappers\SaleProductNewDtoMapper;

class SaleController extends BaseController
{
    /**
     * @var SaleServiceInterface
     */
    private SaleServiceInterface $saleService;

    private SaleProductServiceInterface $saleProductService;

    /**
     * @param SaleServiceInterface $saleService
     * @param SaleProductServiceInterface $saleProductService
     */
    public function __construct(
        SaleServiceInterface $saleService,
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

            return [
                'message' => 'Pedido realizada exitosamente'
            ];
        });
    }
}
