<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <!-- Name Field -->
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">{{ trans('dashboard/admin.item_type.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $itemType->name ?? '') }}" required>
        </div>

        <!-- Description Field -->
        <div class="col-md-6 mb-3">
            <label for="description" class="form-label">{{ trans('dashboard/admin.item_type.description') }}</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $itemType->description ?? '') }}</textarea>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            {{ trans('dashboard/general.save') }}
        </button>
    </div>
</form>