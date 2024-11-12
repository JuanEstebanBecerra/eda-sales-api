<?php

namespace SaleValidationManagement\Application\Interfaces\Services;

interface SaleServiceInterface
{
    /**
     * @param int $id
     * @param bool $isValid
     * @return $this
     */
    public function updateIsValid(int $id, bool $isValid): self;
}
