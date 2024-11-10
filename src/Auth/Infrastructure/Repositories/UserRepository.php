<?php

namespace Auth\Infrastructure\Repositories;

use App\Models\User;
use Auth\Infrastructure\Interfaces\Repositories\UserRepositoryInterface;
use Kernel\Infrastructure\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    function getByEmail(string $email): User|null
    {
        return User::where('email', $email)->first();
    }
}
