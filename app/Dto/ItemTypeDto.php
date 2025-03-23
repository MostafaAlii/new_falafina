<?php

namespace App\Dto;

use App\Http\Requests\ItemTypeRequests\CreateRequest;

class ItemTypeDto
{
    public function __construct(
        public string $name,
        public ?string $description = null,
    ) {}

    public static function create(CreateRequest $request): ItemTypeDto
    {
        return new self(
            name: $request->name,
            description: $request->description,
        );
    }
}
