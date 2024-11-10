<?php

namespace Auth\Application\Interfaces\Services;

use App\Models\User;
use Auth\Domain\Dto\LoginDto;
use Auth\Domain\Exceptions\LoginException;

interface AuthServiceInterface
{

    /**
     * @param LoginDto $dto
     * @return array
     * @throws LoginException
     */
    public function login(LoginDto $dto): array;

    /**
     * @param User $user
     * @return $this
     */
    public function logout(User $user): self;
}
