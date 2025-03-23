<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\Dashboard\Admin\ItemTypeDataTable;
use App\Dto\ItemTypeDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemTypeRequests\CreateRequest;
use App\Services\Facades\ItemTypeFacade;

class ItemTypeController extends Controller
{
    public function index(ItemTypeDataTable $itemTypeDataTable)
    {
        return ItemTypeFacade::index($itemTypeDataTable);
    }

    public function create()
    {
        return view('dashboard.admin.item_types.create', ['pageTitle' => trans('dashboard/admin.item_type.create_item_type')]);
    }

    public function store(CreateRequest $request)
    {
        $itemTypeDto = ItemTypeDto::create($request);
        ItemTypeFacade::store($itemTypeDto);

        return redirect()->route('admin.item_types.index')->with('success', trans('dashboard/general.create_success'));
    }

    public function edit($id)
    {
        $itemType = ItemTypeFacade::find($id);

        return view('dashboard.admin.item_types.edit', compact('itemType'));
    }

    public function update(CreateRequest $request, $id)
    {
        $itemTypeDto = ItemTypeDto::create($request);
        ItemTypeFacade::update($itemTypeDto, $id);

        return redirect()->route('admin.item_types.index')->with('success', trans('dashboard/general.update_success'));
    }

    public function destroy($id)
    {
        ItemTypeFacade::destroy($id);

        return redirect()->route('admin.item_types.index')->with('success', trans('dashboard/general.delete_success'));
    }
}
