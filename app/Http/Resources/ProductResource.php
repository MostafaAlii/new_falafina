<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource {
    public function toArray($request) {
        // Attach items to each item type
        $itemTypes = $this->whenLoaded('itemTypes', function () {
            return $this->itemTypes->map(function ($itemType) {
                // Filter items for this item type
                $itemType->items = $this->items->where('item_type_id', $itemType->id);
                return $itemType;
            });
        });

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'type' => $this->type,
            'price' => $this->price,
            'category' => new CategoryResource($this->whenLoaded('category')), // Include category
            'sizes' => SizeResource::collection($this->whenLoaded('sizes')), // Include sizes
            'item_types' => ItemTypeResource::collection($itemTypes), // Include itemTypes with their items
            'images' => $this->getFirstMediaUrl('images'),
        ];
    }
}
