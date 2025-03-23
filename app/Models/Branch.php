<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model {
    use HasFactory;
    protected $table = "branches";
    protected $fillable = ['name', 'latitude', 'longitude', 'address'];

    public static function boot() {
        parent::boot();
        static::saving(function ($branch) {
            if (!$branch->address && $branch->latitude && $branch->longitude) {
                $branch->address = self::fetchAddress($branch->latitude, $branch->longitude);
            }
        });
    }

    public static function fetchAddress($lat, $lng) {
        $apiUrl = "https://nominatim.openstreetmap.org/reverse";
        $response = Http::get($apiUrl, [
            'lat' => $lat,
            'lon' => $lng,
            'format' => 'json',
            'accept-language' => 'ar'
        ]);
        if ($response->successful() && isset($response['display_name'])) {
            return $response['display_name'];
        }
        return 'لم يتم العثور على عنوان';
    }
    public function getAddressAttribute() {
        if (!$this->latitude || !$this->longitude) {
            return 'إحداثيات غير متوفرة';
        }
        $apiUrl = "https://nominatim.openstreetmap.org/reverse";
        $response = Http::get($apiUrl, [
            'lat' => $this->latitude,
            'lon' => $this->longitude,
            'format' => 'json',
            'accept-language' => 'ar'
        ]);
        if ($response->successful() && isset($response['display_name'])) {
            return $response['display_name'];
        }
        return 'لم يتم العثور على عنوان';
    }
}
