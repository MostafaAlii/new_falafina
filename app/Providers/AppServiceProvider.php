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
        $logo = $this->getMediaUrls('dashboard', $settings, null, 'media', 'logo') ?? null;
        $favicon = $this->getMediaUrls('dashboard', $settings, null, 'media', 'favicon') ?? null;
        View::share([
            'settings' => $settings,
            'logo' => $logo,
            'favicon' => $favicon,
        ]);
    }
}
