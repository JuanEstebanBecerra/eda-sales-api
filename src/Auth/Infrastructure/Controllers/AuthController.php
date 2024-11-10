<?php

namespace Auth\Infrastructure\Controllers;

use Auth\Application\Interfaces\Services\AuthServiceInterface;
use Auth\Application\Mappers\LoginDtoMapper;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Kernel\Infrastructure\Controllers\BaseController;

class AuthController extends BaseController
{
    private AuthServiceInterface $authService;

    function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => ['string', 'required'],
            'password' => ['string', 'required'],
        ]);

        return $this->execWithJsonResponse(function () use ($request) {
            $dto = (new LoginDtoMapper())
                ->createFromRequest($request);

            $loginData = $this->authService->login($dto);

            return [
                'message' => 'Inicio de sesión realizado exitosamente',
                'data' => $loginData
            ];
        });
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        return $this->execWithJsonResponse(function () use ($request) {
            $this->authService->logout($request->user());

            return [
                'message' => 'Sesión cerrada exitosamente',
            ];
        });
    }
}
