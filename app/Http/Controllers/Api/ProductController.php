<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Services\Facades\ProductFacade;
use App\Traits\ApiTrait;

class ProductController extends Controller
{
    use ApiTrait;
    public function showProduct($id) {
        $product = ProductFacade::find($id);
        return $this->successResponse(new ProductResource($product), 'Product details retrieved successfully');
    }
}
