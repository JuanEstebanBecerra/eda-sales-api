<?php

namespace SaleManagement\Infrastructure\Interfaces\Repositories;

use Illuminate\Support\Collection;
use Kernel\Infrastructure\Interfaces\Repositories\BaseRepositoryInterface;
use SaleManagement\Domain\Dto\ProductDto;
use SaleManagement\Domain\Dto\SaleNewDto;
use SaleManagement\Domain\Dto\ProductUpdateDto;
use SaleManagement\Domain\Exceptions\ProductNotFoundException;

interface SaleRepositoryInterface extends BaseRepositoryInterface
{

    /**
     * @param SaleNewDto $dto
     * @return SaleNewDto
     */
    public function store(SaleNewDto $dto): SaleNewDto;
}
