<?php

namespace Auth\Infrastructure\Interfaces\Repositories;

use App\Models\User;
use Kernel\Infrastructure\Interfaces\Repositories\BaseRepositoryInterface;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    function getByEmail(string $email): User|null;
}
