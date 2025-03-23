<?php

namespace App\DataTables\Dashboard\Admin;

use App\DataTables\Base\BaseDataTable;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Utilities\Request as DataTableRequest;

class ProductDataTable extends BaseDataTable
{
    public function __construct(DataTableRequest $request)
    {
        parent::__construct(new Product);
        $this->request = $request;
    }

    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Product $product) {
                return view('dashboard.admin.products.btn.actions', compact('product'));
            })
            ->editColumn('created_at', function (Product $product) {
                return $this->formatBadge($this->formatDate($product->created_at));
            })
            ->editColumn('updated_at', function (Product $product) {
                return $this->formatBadge($this->formatDate($product->updated_at));
            })
            ->rawColumns(['action', 'created_at', 'updated_at']);
    }

    public function query(): QueryBuilder
    {
        return Product::with(['category', 'sizes', 'items', 'itemTypes'])->latest();
    }

    public function getColumns(): array
    {
        return [
            ['name' => 'id', 'data' => 'id', 'title' => '#', 'orderable' => false, 'searchable' => false],
            ['name' => 'name', 'data' => 'name', 'title' => trans('dashboard/admin.product.name')],
            ['name' => 'category', 'data' => 'category.name', 'title' => trans('dashboard/admin.product.category')],
            ['name' => 'type', 'data' => 'type', 'title' => trans('dashboard/admin.product.type')],
            ['name' => 'price', 'data' => 'price', 'title' => trans('dashboard/admin.product.price')],
            ['name' => 'created_at', 'data' => 'created_at', 'title' => trans('dashboard/general.created_at'), 'orderable' => false, 'searchable' => false],
            ['name' => 'updated_at', 'data' => 'updated_at', 'title' => trans('dashboard/general.updated_at'), 'orderable' => false, 'searchable' => false],
            ['name' => 'action', 'data' => 'action', 'title' => trans('dashboard/general.actions'), 'orderable' => false, 'searchable' => false],
        ];
    }
}
