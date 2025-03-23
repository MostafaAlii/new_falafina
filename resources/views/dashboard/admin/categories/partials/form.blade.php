<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <!-- Name Field -->
        <div class="col-md-12 mb-12">
            <label for="name" class="form-label">{{ trans('dashboard/admin.category.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            {{ trans('dashboard/general.save') }}
        </button>
    </div>
</form>
