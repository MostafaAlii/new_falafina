<?php

namespace App\Repositories;

use App\Dto\UserDto;
use App\Models\User;

class UserRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new User;
    }

    public function create(UserDto $userDto)
    {
        return $this->model->create([
            'name' => $userDto->name,
            'email' => $userDto->email,
            'password' => $userDto->password,
        ]);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }
}
