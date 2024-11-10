<?php

namespace Auth\Application\Services;

use App\Models\User;
use Auth\Application\Interfaces\Services\AuthServiceInterface;
use Auth\Domain\Dto\LoginDto;
use Auth\Domain\Exceptions\LoginException;
use Auth\Infrastructure\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthService implements AuthServiceInterface
{

    private UserRepositoryInterface $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param LoginDto $dto
     * @return array
     * @throws LoginException
     */
    public function login(LoginDto $dto): array
    {
        $user = $this->userRepository->getByEmail($dto->email);

        if (!$user || !Hash::check($dto->password, $user->password)) throw new LoginException();

        $token = $user->createToken('test')->plainTextToken;

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60 * 60,
        ];
    }

    /**
     * @param User $user
     * @return $this
     */
    public function logout(User $user): self
    {
        $user->currentAccessToken()->delete();
        return $this;
    }
}
