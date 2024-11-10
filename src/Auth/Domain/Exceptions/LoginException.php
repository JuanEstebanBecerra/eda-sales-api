<?php

namespace Auth\Domain\Exceptions;

use Exception;

class LoginException extends Exception
{
    /**
     * @var int
     */
    protected $code = 200;

    /**
     * @var string
     */
    protected $message = 'Login failed';
}
