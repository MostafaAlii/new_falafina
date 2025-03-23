<?php

namespace App\Services\Contracts;

use App\DataTables\Dashboard\Admin\ProductDataTable;
use App\Dto\ProductDto;

interface ProductInterface
{
    public function index(ProductDataTable $productDataTable);

    public function store(ProductDto $productDto);

    public function update(ProductDto $productDto, $id);

    public function find($id);

    public function destroy($id);
}
