<form action="{{ $action }}" method="POST">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <!-- Name Field -->
        <div class="col-md-6 mb-3">
            <label for="name" class="form-label">{{ trans('dashboard/admin.name') }}</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $admin->name ?? '') }}" required>
        </div>

        <!-- Email Field -->
        <div class="col-md-6 mb-3">
            <label for="email" class="form-label">{{ trans('dashboard/admin.email') }}</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $admin->email ?? '') }}" required>
        </div>

        <!-- Password Field -->
        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">{{ trans('dashboard/admin.password') }}</label>
            <input type="password" name="password" id="password" class="form-control" {{ $method === 'POST' ? 'required' : '' }}>
            @if ($method === 'PUT')
                <small class="text-muted">{{ trans('dashboard/admin.leave_blank_password') }}</small>
            @endif
        </div>

        <!-- Password Confirmation Field -->
        <div class="col-md-6 mb-3">
            <label for="password_confirmation" class="form-label">{{ trans('dashboard/admin.password_confirmation') }}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <!-- Phone Field -->
        <div class="col-md-6 mb-3">
            <label for="phone" class="form-label">{{ trans('dashboard/admin.phone') }}</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $admin->phone ?? '') }}">
        </div>

        <!-- Status Field -->
        <div class="col-md-6 mb-3">
            <label for="status" class="form-label">{{ trans('dashboard/general.status') }}</label>
            <select name="status" id="status" class="form-select" required>
                <option value="active" {{ old('status', $admin->status ?? '') === 'active' ? 'selected' : '' }}>{{ trans('dashboard/general.active') }}</option>
                <option value="inactive" {{ old('status', $admin->status ?? '') === 'inactive' ? 'selected' : '' }}>{{ trans('dashboard/general.inactive') }}</option>
            </select>
        </div>

        <!-- Type Field -->
        <div class="col-md-12 mb-3">
            <label for="type" class="form-label">{{ trans('dashboard/admin.type') }}</label>
            <select name="type" id="type" class="form-select" required>
                <option value="admin" {{ old('type', $admin->type ?? '') === 'admin' ? 'selected' : '' }}>{{ trans('dashboard/admin.admin') }}</option>
                <option value="supervisor" {{ old('type', $admin->type ?? '') === 'supervisor' ? 'selected' : '' }}>{{ trans('dashboard/admin.supervisor') }}</option>
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            {{ trans('dashboard/general.save') }}
        </button>
    </div>
</form>
