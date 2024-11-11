<?php

namespace SaleManagement\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Kernel\Infrastructure\Repositories\BaseRepository;
use SaleManagement\Domain\Dto\SaleProductNewDto;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleProductRepositoryInterface;

class SaleProductRepository extends BaseRepository implements SaleProductRepositoryInterface
{
    /**
     * @param SaleProductNewDto $dto
     * @return SaleProductNewDto
     */
    public function store(SaleProductNewDto $dto): SaleProductNewDto
    {
        $id = DB::table('sale_products')->insertGetId([
            'sale_id' => $dto->saleId,
            'product_id' => $dto->productId,
            'amount' => $dto->amount,
            'created_at' => now(),
//            'user_who_created' => $this->user->id
        ]);

        $dto->id = $id;

        return $dto;
    }
}
