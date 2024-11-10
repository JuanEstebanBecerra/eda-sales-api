<?php

namespace Auth\Domain\Dto;

use Kernel\Domain\Dto\BaseDto;

class LoginDto extends BaseDto
{
    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;
}
