<?php

namespace App\Providers;

use App\Helpers\AliasHelper;
use Illuminate\Support\ServiceProvider;
use App\Models\{Setting};
use Illuminate\Support\Facades\{View, Cache};
use App\Models\Concerns\UploadMedia;
class AppServiceProvider extends ServiceProvider {
    use UploadMedia;
    public function register(): void {}

    public function boot(): void
    {
        $settings = Cache::rememberForever('settings', function () {
            return Setting::with(['media'])->first() ?? new Setting();
        });
        $logo = $settings->getMediaUrl('logo') ?? null;
        $favicon = $settings->getMediaUrl('favicon') ?? null;
        View::share([
            'settings' => $settings,
            'logo' => $logo,
            'favicon' => $favicon,
        ]);
    }
}
