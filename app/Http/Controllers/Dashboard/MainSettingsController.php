<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainSettingRequest;
use App\Services\Contracts\MainSettingInterface;

class MainSettingsController extends Controller {
    public function __construct(protected MainSettingInterface $settingRepository) {
        $this->settingRepository = $settingRepository;
    }
    public function index() {
        return $this->settingRepository->index();
    }

    public function store(MainSettingRequest $request) {
        return $this->settingRepository->save($request);
    }
}
