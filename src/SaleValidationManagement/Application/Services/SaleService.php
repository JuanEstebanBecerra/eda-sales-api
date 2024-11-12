<?php

namespace SaleValidationManagement\Application\Services;

use SaleValidationManagement\Application\Interfaces\Services\SaleServiceInterface;
use SaleValidationManagement\Infrastructure\Interfaces\Repositories\SaleRepositoryInterface;

class SaleService implements SaleServiceInterface
{
    private SaleRepositoryInterface $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    /**
     * @param int $id
     * @param bool $isValid
     * @return $this
     */
    public function updateIsValid(int $id, bool $isValid): self
    {
        $this->saleRepository
            ->updateIsValid($id, $isValid);

        return $this;
    }
}
