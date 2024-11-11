<?php

namespace SaleManagement\Application\Services;

use SaleManagement\Application\Interfaces\Services\SaleProductServiceInterface;
use SaleManagement\Domain\Dto\SaleProductNewDto;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleProductRepositoryInterface;

class SaleProductService implements SaleProductServiceInterface
{
    /**
     * @var SaleProductRepositoryInterface
     */
    private SaleProductRepositoryInterface $saleProductRepository;

    /**
     * @param SaleProductRepositoryInterface $saleProductRepository
     */
    public function __construct(SaleProductRepositoryInterface $saleProductRepository)
    {
        $this->saleProductRepository = $saleProductRepository;
    }

    /**
     * @param SaleProductNewDto $dto
     * @return SaleProductNewDto
     */
    public function store(SaleProductNewDto $dto): SaleProductNewDto
    {
        return $this->saleProductRepository
            ->setUser(auth()->user())
            ->store($dto);
    }
}
