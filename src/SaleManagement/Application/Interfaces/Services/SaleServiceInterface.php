<?php

namespace SaleManagement\Application\Interfaces\Services;

use Illuminate\Support\Collection;
use SaleManagement\Domain\Dto\ProductDto;
use SaleManagement\Domain\Dto\SaleNewDto;
use SaleManagement\Domain\Dto\ProductUpdateDto;
use SaleManagement\Domain\Exceptions\ProductNotFoundException;

interface SaleServiceInterface
{
    /**
     * @param SaleNewDto $dto
     * @return SaleNewDto
     */
    public function store(SaleNewDto $dto): SaleNewDto;
}
