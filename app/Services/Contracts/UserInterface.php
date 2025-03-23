<?php

namespace App\Services\Contracts;

use App\Dto\UserDto;

interface UserInterface
{
    public function register(UserDto $userDto);

    public function login(UserDto $userDto);
}
