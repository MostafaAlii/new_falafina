<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\Admin\CategoryDataTable;
use App\Dto\CategoryDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\CreateRequest;
use App\Services\Facades\CategoryFacade;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $categoryDataTable)
    {
        return CategoryFacade::index($categoryDataTable);
    }

    public function create()
    {
        return view('dashboard.admin.categories.create', ['pageTitle' => trans('dashboard/category.categories')]);
    }

    public function store(CreateRequest $request)
    {
        $categoryDto = CategoryDto::create($request);
        CategoryFacade::store($categoryDto);

        return redirect()->route('admin.categories.index')->with('success', trans('dashboard/general.create_success'));
    }

    public function edit($id)
    {
        $category = CategoryFacade::find($id);

        return view('dashboard.admin.categories.edit', compact('category'));
    }

    public function update(CreateRequest $request, $id)
    {
        $categoryDto = CategoryDto::create($request);
        CategoryFacade::update($categoryDto, $id);

        return redirect()->route('admin.categories.index')->with('success', trans('dashboard/general.update_success'));
    }

    public function destroy($id)
    {
        CategoryFacade::destroy($id);

        return redirect()->route('admin.categories.index')->with('success', trans('dashboard/general.delete_success'));
    }
}
