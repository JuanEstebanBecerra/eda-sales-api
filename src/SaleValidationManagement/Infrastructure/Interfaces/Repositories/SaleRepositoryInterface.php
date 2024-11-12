<?php

namespace SaleValidationManagement\Infrastructure\Interfaces\Repositories;

use Kernel\Infrastructure\Interfaces\Repositories\BaseRepositoryInterface;

interface SaleRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param int $id
     * @param bool $isValid
     * @return $this
     */
    public function updateIsValid(int $id, bool $isValid): self;
}
