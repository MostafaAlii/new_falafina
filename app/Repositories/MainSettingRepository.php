<?php

namespace App\Repositories;

use App\Http\Requests\MainSettingRequest;
use App\Models\{Setting};
use App\Services\Contracts\MainSettingInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Session};
use App\Models\Concerns\UploadMedia;
use Illuminate\Support\Facades\Cache;

class MainSettingRepository implements MainSettingInterface {
    use UploadMedia;
    public function index() {
        $setting = Setting::with(['media'])->orderBy('created_at', 'DESC')->first();
        $logo = $setting ? $this->getMediaUrls('dashboard', $setting, null, 'media', 'logo') : null;
        //$logo = $this->getMediaUrls('dashboard', $setting, null, 'media', 'logo') ?? null;
        $favicon = $setting ? $this->getMediaUrls('dashboard', $setting, null, 'media', 'favicon') : null;
        return view('dashboard.admin.settings.index', [
            'title' => 'General Main Settings',
            'setting' => $setting,
            'logo' => $logo,
            'favicon' => $favicon,
        ]);
    }


    public function save(MainSettingRequest $request)
    {
        try {
            $setting = Setting::firstOrNew([]);
            $setting->fill($request->only([
                'email',
                'name',
                'description',
                'phone',
                'address'
            ]));
            $setting->save();

            if ($request->hasFile('logo'))
                $this->updateSingleMedia('dashboard', $request->file('logo'), $setting, null, 'media', true, true, 'logo', false);

            if ($request->hasFile('favicon'))
                $this->updateSingleMedia('dashboard', $request->file('favicon'), $setting, null, 'media', true, false, 'favicon', false);

            if ($request->hasFile('banner'))
                $this->updateSingleMedia('dashboard', $request->file('banner'), $setting, null, 'media', true, false, 'banner', false);
            return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح.');
            Cache::forget('settings');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التحديث: ' . $e->getMessage());
        }
    }
}
