<?php

namespace Auth\Application\Mappers;

use Auth\Domain\Dto\LoginDto;
use Illuminate\Http\Request;
use Kernel\Application\Mappers\BaseMapper;
use Kernel\Domain\Dto\BaseDto;

class LoginDtoMapper extends BaseMapper
{
    /**
     * @return BaseDto
     */
    protected function getNewDto(): BaseDto
    {
        return new LoginDto();
    }

    /**
     * @param Request $request
     * @return LoginDto
     */
    public function createFromRequest(Request $request): LoginDto
    {
        $dto = new LoginDto();
        $dto->email = $request->email;
        $dto->password = $request->password;

        return $dto;
    }
}
