<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\Admin\ItemDataTable;
use App\Dto\ItemDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequests\CreateRequest;
use App\Models\ItemType;
use App\Services\Facades\ItemFacade;

class ItemController extends Controller
{
    public function index(ItemDataTable $itemDataTable)
    {
        return ItemFacade::index($itemDataTable);
    }

    public function create()
    {
        $itemTypes = ItemType::all(); // Fetch all item types for the dropdown

        return view('dashboard.admin.items.create', compact('itemTypes'));
    }

    public function store(CreateRequest $request)
    {
        $itemDto = ItemDto::create($request);  // إنشاء ItemDto باستخدام CreateRequest
        ItemFacade::store($request, $itemDto);
        return redirect()->route('admin.items.index')->with('success', trans('dashboard/general.create_success'));
    }

    public function edit($id)
    {
        $item = ItemFacade::find($id);
        $itemTypes = ItemType::all(); // Fetch all item types for the dropdown

        return view('dashboard.admin.items.edit', compact('item', 'itemTypes'));
    }

    public function update(CreateRequest $request, $id)
    {
        $itemDto = ItemDto::create($request);
        //ItemFacade::update($itemDto, $id);
        ItemFacade::update($request, $itemDto, $id);
        return redirect()->route('admin.items.index')->with('success', trans('dashboard/general.update_success'));
    }

    public function destroy($id)
    {
        ItemFacade::destroy($id);

        return redirect()->route('admin.items.index')->with('success', trans('dashboard/general.delete_success'));
    }
}
