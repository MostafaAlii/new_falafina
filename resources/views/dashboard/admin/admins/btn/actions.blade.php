<div class="d-flex justify-content-center">
    <!-- Edit Button -->
    <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-primary btn-sm mx-1" title="Edit">
        <i class="fas fa-edit"></i> <!-- Font Awesome edit icon -->
    </a>

    <!-- Delete Button (Optional) -->
    <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mx-1" title="Delete">
            <i class="fas fa-trash"></i> <!-- Font Awesome trash icon -->
        </button>
    </form>
</div>
