<?php

namespace SaleManagement\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Kernel\Infrastructure\Repositories\BaseRepository;
use SaleManagement\Domain\Dto\SaleNewDto;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleRepositoryInterface;

class SaleRepository extends BaseRepository implements SaleRepositoryInterface
{
    /**
     * @param SaleNewDto $dto
     * @return SaleNewDto
     */
    public function store(SaleNewDto $dto): SaleNewDto
    {
        $id = DB::table('sales')->insertGetId([
            'created_at' => now(),
//            'user_who_created' => $this->user->id
        ]);

        $dto->id = $id;

        return $dto;
    }
}
