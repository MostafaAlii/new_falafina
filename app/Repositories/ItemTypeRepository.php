<?php

namespace App\Repositories;

use App\DataTables\Dashboard\Admin\ItemTypeDataTable;
use App\Dto\ItemTypeDto;
use App\Models\ItemType;

class ItemTypeRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ItemType;
    }

    public function index(ItemTypeDataTable $itemTypeDataTable)
    {
        return $itemTypeDataTable->render('dashboard.admin.item_types.index', ['pageTitle' => trans('dashboard/admin.item_type.item_types')]);
    }

    public function store(ItemTypeDto $itemTypeDto)
    {
        return $this->model->create([
            'name' => $itemTypeDto->name,
            'description' => $itemTypeDto->description,
        ]);
    }

    public function update(ItemTypeDto $itemTypeDto, $id)
    {
        $itemType = $this->model->findOrFail($id);
        $itemType->update([
            'name' => $itemTypeDto->name,
            'description' => $itemTypeDto->description,
        ]);

        return $itemType;
    }

    public function destroy($id)
    {
        $itemType = $this->find($id);

        return $itemType->delete();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
}
