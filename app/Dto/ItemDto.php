<?php

namespace App\Dto;

use App\Http\Requests\ItemRequests\CreateRequest;
use Illuminate\Http\UploadedFile;

class ItemDto
{
    public function __construct(
        public string $name,
        public int $item_type_id,
        public ?UploadedFile $item = null,
    ) {}

    public static function create(CreateRequest $request): ItemDto
    {
        return new self(
            name: $request->name,
            item_type_id: $request->item_type_id,
            item: $request->file('item'),
        );
    }
}
