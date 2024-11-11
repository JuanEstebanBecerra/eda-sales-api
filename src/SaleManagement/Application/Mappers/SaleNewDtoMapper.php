<?php

namespace SaleManagement\Application\Mappers;

use Illuminate\Http\Request;
use Kernel\Application\Mappers\BaseMapper;
use Kernel\Domain\Dto\BaseDto;
use SaleManagement\Domain\Dto\SaleNewDto;

class SaleNewDtoMapper extends BaseMapper
{
    /**
     * @return SaleNewDto
     */
    protected function getNewDto(): SaleNewDto
    {
        return new SaleNewDto();
    }

    /**
     * @param Request $request
     * @return SaleNewDto
     */
    public function createFromRequest(Request $request): SaleNewDto
    {
        $dto = $this->getNewDto();

        return $dto;
    }

}
