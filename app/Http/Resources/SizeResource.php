<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SizeResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'gram' => $this->gram,
            'price' => $this->pivot->price, // Include pivot data (price)
        ];
    }
}
