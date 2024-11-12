<?php

namespace SaleValidationManagement\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;
use Kernel\Infrastructure\Repositories\BaseRepository;
use SaleValidationManagement\Infrastructure\Interfaces\Repositories\SaleRepositoryInterface;

class SaleRepository extends BaseRepository implements SaleRepositoryInterface
{
    /**
     * @param int $id
     * @param bool $isValid
     * @return $this
     */
    public function updateIsValid(int $id, bool $isValid): self
    {
        DB::table('sales')
            ->where('id', '=', $id)
            ->update([
                'is_valid' => $isValid,
                'updated_at' => now(),
//                'user_who_updated' => $this->user->id
            ]);

        return $this;
    }
}
