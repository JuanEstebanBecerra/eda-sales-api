<?php

namespace SaleManagement\Application\Mappers;

use Illuminate\Http\Request;
use Kernel\Application\Mappers\BaseMapper;
use SaleManagement\Domain\Dto\SaleProductNewDto;

class SaleProductNewDtoMapper extends BaseMapper
{
    /**
     * @return SaleProductNewDto
     */
    protected function getNewDto(): SaleProductNewDto
    {
        return new SaleProductNewDto();
    }

    /**
     * @param array $array
     * @return SaleProductNewDto
     */
    public function createFromArray(array $array): SaleProductNewDto
    {
        $dto = $this->getNewDto();
        $dto->productId = $array['productId'];
        $dto->amount = $array['amount'];

        return $dto;
    }

}
