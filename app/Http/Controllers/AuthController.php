<?php
namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    protected $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function register(AuthRegisterRequest $request): JsonResponse {
        $credentials = $request->validated();
        $newUser = $this->authService->register($credentials);
        $token = $this->authService->generateAccessToken($newUser);

        return new JsonResponse(
            data: ['token' => $token],
            status: Response::HTTP_OK,
        );
    }

    public function login(AuthLoginRequest $request): JsonResponse {
        $credentials = $request->validated();

        if ($this->authService->attemptLogin($credentials)) {
            $token = $this->authService->generateAccessToken(Auth::user());

            return new JsonResponse(
                data: ['token' => $token],
                status: Response::HTTP_OK,
            );
        }

        return new JsonResponse(
            data: ['token' => null],
            status: Response::HTTP_UNAUTHORIZED,
        );
    }
}