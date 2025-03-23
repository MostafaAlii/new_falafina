<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <!-- Name Field -->
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">{{ trans('dashboard/admin.item.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name ?? '') }}" required>
        </div>

        <!-- Item Type Field -->
        <div class="col-md-6 mb-3">
            <label for="item_type_id" class="form-label">{{ trans('dashboard/admin.item.item_type') }}</label>
            <select name="item_type_id" id="item_type_id" class="form-control" required>
                <option value="">Select Item Type</option>
                @foreach ($itemTypes as $itemType)
                    <option value="{{ $itemType->id }}" {{ old('item_type_id', $item->item_type_id ?? '') == $itemType->id ? 'selected' : '' }}>
                        {{ $itemType->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Image Field -->

        <div class="col-md-12 mb-3">
            <label for="image" class="form-label">{{ trans('dashboard/admin.item.image') }}</label>
            <input type="file" name="item" accept="image/*" id="itemInput">
            <img id="imagePreview" src="{{ $item?->media?->isNotEmpty() ? $item->getMediaUrls('dashboard', $item, null, 'media', 'item')['original'] : asset('path/to/default/image.jpg') }}" alt="{{ $item?->name }}" width="100">
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            {{ trans('dashboard/general.save') }}
        </button>
    </div>
</form>
