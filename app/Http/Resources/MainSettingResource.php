<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class MainSettingResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'phone' => $this->phone,
            'description' => $this->description,
            'logo' => $this->getMediaUrl('logo'),
        ];
    }
}
