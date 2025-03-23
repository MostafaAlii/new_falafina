<?php

namespace App\Repositories;

use App\DataTables\Dashboard\Admin\ItemDataTable;
use App\Dto\ItemDto;
use App\Models\Item;
use Illuminate\Http\UploadedFile;
use App\Models\Concerns\UploadMedia;
use Illuminate\Http\Request;
class ItemRepository
{
    use UploadMedia;
    protected Item $model;

    public function __construct()
    {
        $this->model = new Item;
    }

    public function index(ItemDataTable $itemDataTable)
    {
        return $itemDataTable->render('dashboard.admin.items.index', [
            'pageTitle' => trans('dashboard/admin.item.items'),
        ]);
    }

    public function store(Request $request, ItemDto $itemDto): Item {
        $item = $this->model->create($this->mapData($itemDto));
        if ($request->hasFile('item')) {
            $this->uploadSingleMedia('dashboard',$request->file('item'),$item,null,'media',true,true,'item',false);
        }
        return $item;
    }

    public function update(Request $request, ItemDto $itemDto, int $id): Item {
        $item = $this->find($id);
        $item->update($this->mapData($itemDto));
        if ($request->hasFile('item')) {
            $this->updateSingleMedia(
                'dashboard', // مجلد التخزين
                $request->file('item'), // الملف المرفوع
                $item, // النموذج الذي سيتم التحديث عليه
                'item', // اسم العمود
                'media', // العلاقة
                true, // استخدام التخزين العام
                true, // إنشاء الصورة المصغرة
                'item', // اسم المجموعة
                false // لا نضيف علامة مائية في هذه الحالة
            );
        }
        return $item;
    }


    public function destroy(int $id): bool {
        $item = $this->find($id);
        $this->deleteExistingMedia('dashboard', $item, 'item', 'media', true, 'item');
        return $item->delete();
    }

    public function find(int $id): Item
    {
        return $this->model->with(['media'])->findOrFail($id);
    }

    private function mapData(ItemDto $itemDto): array
    {
        return [
            'name' => $itemDto->name,
            'item_type_id' => $itemDto->item_type_id,
        ];
    }

    private function handleImageUpload(Item $item, ?UploadedFile $image, bool $clearOld = false): void
    {
        if ($image instanceof UploadedFile) {
            if ($clearOld) {
                $item->clearMediaCollection('images');
            }
            $item->addMedia($image)->toMediaCollection('images');
        }
    }
}
