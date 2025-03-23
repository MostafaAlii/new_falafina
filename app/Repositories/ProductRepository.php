<?php

namespace App\Repositories;

use App\DataTables\Dashboard\Admin\ProductDataTable;
use App\Dto\ProductDto;
use App\Models\Product;
use Illuminate\Http\UploadedFile;

class ProductRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product;
    }

    public function index(ProductDataTable $productDataTable)
    {
        return $productDataTable->render('dashboard.admin.products.index', [
            'pageTitle' => trans('dashboard/admin.product.products'),
        ]);
    }

    public function store(ProductDto $productDto): Product
    {
        $product = $this->model->create($productDto->only(['name', 'description', 'category_id', 'type', 'price']));
        $this->handleImageUpload($product, $productDto->image);
        $this->syncRelations($product, $productDto);

        return $product;
    }

    public function update(ProductDto $productDto, int $id): Product
    {

        $product = $this->find($id);
        $product->update($productDto->only(['name', 'description', 'category_id', 'type', 'price']));
        $this->handleImageUpload($product, $productDto->image, true);
        $this->syncRelations($product, $productDto);

        return $product;
    }

    public function destroy(int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function find(int $id): Product
    {
        return $this->model->with(['itemTypes', 'items', 'category', 'sizes'])->findOrFail($id);
    }

    private function syncRelations(Product $product, ProductDto $productDto): void
    {
        // Sync Items
        if ($productDto->items) {
            $itemIds = [];
            foreach ($productDto->items as $itemTypeId => $itemIdsArray) {
                foreach ($itemIdsArray as $itemId) {
                    $itemIds[] = $itemId;
                }
            }

            $product->items()->sync($itemIds);
        }
        // Sync Sizes
        if ($productDto->sizes) {
            $sizesData = collect($productDto->sizes)
                ->filter(fn ($size) => !empty($size['size_id']) && is_numeric($size['size_id']))
                ->mapWithKeys(fn ($size) => [
                    $size['size_id'] => ['price' => $size['price'] ?? $product->price],
                ])
                ->toArray();

            $product->sizes()->sync($sizesData);
        }

        // Sync Item Types
        if ($productDto->itemTypes) {
            $itemTypeIds = collect($productDto->itemTypes)
                ->filter(fn ($itemTypeId) => !empty($itemTypeId) && is_numeric($itemTypeId))
                ->toArray();

            $product->itemTypes()->sync($itemTypeIds);
        }
    }

    private function handleImageUpload(Product $product, ?UploadedFile $image, bool $clearOld = false): void
    {
        if ($image instanceof UploadedFile) {
            if ($clearOld) {
                $product->clearMediaCollection('images');
            }
            $product->addMedia($image)->toMediaCollection('images');
        }
    }
}

