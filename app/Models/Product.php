<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'description', 'category_id', 'type', 'price'];

    public function sizes()
    {
        return $this->belongsToMany(Size::class)->withPivot('price');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'product_item'); // Explicitly specify the table name
    }

    public function itemTypes()
    {
        return $this->belongsToMany(ItemType::class, 'product_item_type');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->singleFile();
    }
}
