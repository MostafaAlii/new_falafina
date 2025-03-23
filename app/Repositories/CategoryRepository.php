<?php

namespace App\Repositories;

use App\DataTables\Dashboard\Admin\CategoryDataTable;
use App\Dto\CategoryDto;
use App\Models\Category;

class CategoryRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new Category;
    }

    public function index(CategoryDataTable $categoryDataTable)
    {
        return $categoryDataTable->render('dashboard.admin.categories.index', ['pageTitle' => trans('dashboard/category.categories')]);
    }

    public function store(CategoryDto $categoryDto)
    {
        return $this->model->create([
            'name' => $categoryDto->name,
        ]);
    }

    public function update(CategoryDto $categoryDto, $id)
    {
        $category = $this->model->findOrFail($id);
        $category->update([
            'name' => $categoryDto->name,
        ]);

        return $category;
    }

    public function destroy($id)
    {
        $category = $this->find($id);

        return $category->delete();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
