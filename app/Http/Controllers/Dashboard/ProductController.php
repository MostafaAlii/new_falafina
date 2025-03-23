<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\Admin\ProductDataTable;
use App\Dto\ProductDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequests\CreateRequest;
use App\Models\Category;
use App\Models\ItemType;
use App\Models\Size;
use App\Services\Facades\ProductFacade;

class ProductController extends Controller
{
    public function index(ProductDataTable $productDataTable)
    {
        return ProductFacade::index($productDataTable);
    }

    public function create()
    {
        return view('dashboard.admin.products.create', [
            'pageTitle' => trans('dashboard/admin.product.create_product'),
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'itemTypes' => ItemType::all(),
        ]);
    }

    public function store(CreateRequest $request)
    {
        $productDto = ProductDto::create($request);
        ProductFacade::store($productDto);

        return redirect()->route('admin.products.index')->with('success', trans('dashboard/general.create_success'));
    }

    public function edit($id)
    {
        $product = ProductFacade::find($id);

        return view('dashboard.admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
            'sizes' => Size::all(),
            'itemTypes' => ItemType::all(),
        ]);
    }

    public function update(CreateRequest $request, $id)
    {
        $productDto = ProductDto::create($request);
        ProductFacade::update($productDto, $id);

        return redirect()->route('admin.products.index')->with('success', trans('dashboard/general.update_success'));
    }

    public function destroy($id)
    {
        ProductFacade::destroy($id);

        return redirect()->route('admin.products.index')->with('success', trans('dashboard/general.delete_success'));
    }
}
