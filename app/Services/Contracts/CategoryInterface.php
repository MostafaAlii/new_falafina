<?php

namespace App\Services\Contracts;

use App\DataTables\Dashboard\Admin\CategoryDataTable;
use App\Dto\CategoryDto;

interface CategoryInterface
{
    public function index(CategoryDataTable $categoryDataTable);

    public function store(CategoryDto $categoryDto);

    public function update(CategoryDto $categoryDto, $id);

    public function find($id);

    public function destroy($id);
}
