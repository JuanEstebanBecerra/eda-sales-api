<?php

namespace SaleManagement\Application\Services;

use Illuminate\Support\Collection;
use SaleManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleManagement\Domain\Dto\ProductDto;
use SaleManagement\Domain\Dto\SaleNewDto;
use SaleManagement\Domain\Dto\ProductUpdateDto;
use SaleManagement\Domain\Exceptions\ProductNotFoundException;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleProductRepositoryInterface;
use SaleManagement\Infrastructure\Interfaces\Repositories\SaleRepositoryInterface;

class SaleService implements SaleServiceInterface
{
    /**
     * @var SaleRepositoryInterface
     */
    private SaleRepositoryInterface $saleRepository;

    /**
     * @param SaleRepositoryInterface $saleRepository
     */
    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    /**
     * @param SaleNewDto $dto
     * @return SaleNewDto
     */
    public function store(SaleNewDto $dto): SaleNewDto
    {
        return $this->saleRepository
            ->setUser(auth()->user())
            ->store($dto);
    }
}
