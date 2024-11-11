<?php

namespace SaleManagement\Application\Interfaces\Services;

use SaleManagement\Domain\Dto\SaleProductNewDto;

interface SaleProductServiceInterface
{
    /**
     * @param SaleProductNewDto $dto
     * @return SaleProductNewDto
     */
    public function store(SaleProductNewDto $dto): SaleProductNewDto;
}
