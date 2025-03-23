<div class="d-flex justify-content-center">
    <!-- Edit Button -->
    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm mx-1" title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    <!-- Delete Button -->
    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm mx-1" title="Delete">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
