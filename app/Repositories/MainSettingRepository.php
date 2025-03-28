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
        return view('dashboard.admin.settings.index', [
            'title' => 'General Main Settings',
            'setting' => $setting,
        ]);
    }


    public function save(MainSettingRequest $request) {
        try {
            $setting = Setting::firstOrNew([]);
            $setting->fill($request->only([
                'email',
                'name',
                'description',
                'phone',
                'address',
                'currency',
                'loyalty_points'
            ]));
            $setting->save();

            if ($request->hasFile('logo'))
                $setting->updateMedia($request->file('logo'), 'logo', 'root');
            if ($request->hasFile('favicon'))
                $setting->updateMedia($request->file('favicon'), 'favicon', 'root');
            return redirect()->back()->with('success', 'تم تحديث الإعدادات بنجاح.');
            Cache::forget('settings');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ أثناء التحديث: ' . $e->getMessage());
        }
    }
}
