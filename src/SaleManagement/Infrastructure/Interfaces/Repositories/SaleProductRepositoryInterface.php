<?php

namespace SaleManagement\Infrastructure\Interfaces\Repositories;

use Kernel\Infrastructure\Interfaces\Repositories\BaseRepositoryInterface;
use SaleManagement\Domain\Dto\SaleProductNewDto;

interface SaleProductRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param SaleProductNewDto $dto
     * @return SaleProductNewDto
     */
    public function store(SaleProductNewDto $dto): SaleProductNewDto;
}
