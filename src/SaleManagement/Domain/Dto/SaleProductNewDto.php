<?php

namespace SaleManagement\Domain\Dto;

use Kernel\Domain\Dto\BaseDto;

class SaleProductNewDto extends BaseDto
{
    /**
     * @var int|null
     */
    public ?int $id;

    /**
     * @var int
     */
    public int $saleId;

    /**
     * @var int
     */
    public int $productId;

    /**
     * @var int
     */
    public int $amount;
}
