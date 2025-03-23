<?php

namespace App\Http\Controllers\Api\Auth;

use App\Dto\UserDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequests\LoginRequest;
use App\Http\Requests\Api\AuthRequests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\Facades\UserFacade;
use App\Traits\ApiTrait;

class AuthController extends Controller
{
    use ApiTrait;

    public function register(RegisterRequest $request)
    {
        $userDto = UserDto::createFromRegisterRequest($request);
        $user = UserFacade::register($userDto);

        return $this->successResponse(new UserResource($user), 'User registered successfully', 201);
    }

    public function login(LoginRequest $request)
    {
        $userDto = UserDto::createFromLoginRequest($request);
        $result = UserFacade::login($userDto);

        if ($result) {
            return $this->successResponse([
                'user' => new UserResource($result['user']),
                'token' => $result['token'],
                'expires_at' => $result['expires_at'], // Include the expiration time
            ], 'Login successful');
        }

        return $this->errorResponse('Invalid credentials', 401);
    }

    public function logout()
    {
        $user = auth()->user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return $this->successResponse(null, 'Logged out successfully');
    }
}
