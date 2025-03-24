<?php

namespace App\Services\Contracts;

use App\Http\Requests\MainSettingRequest;

interface MainSettingInterface
{
    public function index();
    public function save(MainSettingRequest $request);
}
