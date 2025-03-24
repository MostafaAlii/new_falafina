<?php

namespace App\Models;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model {
    use HasFactory;
    protected $table = "branches";
    protected $fillable = ['name', 'latitude', 'longitude', 'address'];
}
