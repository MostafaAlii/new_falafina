<div class="menu-item">
    <div class="pb-2 menu-content">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ check_guard()->name }} Dashboard</span>
    </div>
</div>

<!-- Admins Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.admins.*') }}">
    <span class="menu-link {{ is_active('admin.admins.*') }}">
        <span class="menu-icon"><i class="bi bi-person fs-2"></i></span>
        <span class="menu-title">{{ trans('dashboard/admin.admins') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.admins.index') }}" href="{{ route('admin.admins.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.admins') }}</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.admins.create') }}" href="{{ route('admin.admins.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.create_admin') }}</span>
            </a>
        </div>
    </div>
</div>
<!-- Branches Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.branches.*') }}">
    <span class="menu-link {{ is_active('admin.branches.*') }}">
        <span class="menu-icon"><i class="bi bi-list fs-2"></i></span>
        <span class="menu-title">الفروع</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.branches.index') }}" href="{{ route('admin.branches.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">الفروع</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.branches.create') }}" href="{{ route('admin.branches.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">إضافة فرع</span>
            </a>
        </div>
    </div>
</div>
<!-- Branches Menu -->
<!-- Categories Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.categories.*') }}">
    <span class="menu-link {{ is_active('admin.categories.*') }}">
        <span class="menu-icon"><i class="bi bi-list fs-2"></i></span>
        <span class="menu-title">{{ trans('dashboard/admin.category.categories') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.categories.index') }}" href="{{ route('admin.categories.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.category.categories') }}</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.categories.create') }}" href="{{ route('admin.categories.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.category.create_category') }}</span>
            </a>
        </div>
    </div>
</div>

<!-- Sizes Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.sizes.*') }}">
    <span class="menu-link {{ is_active('admin.sizes.*') }}">
        <span class="menu-icon"><i class="bi bi-rulers fs-2"></i></span>
        <span class="menu-title">{{ trans('dashboard/admin.size.sizes') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.sizes.index') }}" href="{{ route('admin.sizes.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.size.sizes') }}</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.sizes.create') }}" href="{{ route('admin.sizes.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.size.create_size') }}</span>
            </a>
        </div>
    </div>
</div>

<!-- Item Types Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.item_types.*') }}">
    <span class="menu-link {{ is_active('admin.item_types.*') }}">
        <span class="menu-icon"><i class="bi bi-box fs-2"></i></span>
        <span class="menu-title">{{ trans('dashboard/admin.item_type.item_types') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.item_types.index') }}" href="{{ route('admin.item_types.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.item_type.item_types') }}</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.item_types.create') }}" href="{{ route('admin.item_types.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.item_type.create_item_type') }}</span>
            </a>
        </div>
    </div>
</div>

<!-- Items Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.items.*') }}">
    <span class="menu-link {{ is_active('admin.items.*') }}">
        <span class="menu-icon"><i class="bi bi-box-seam fs-2"></i></span> <!-- Icon for items -->
        <span class="menu-title">{{ trans('dashboard/admin.item.items') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.items.index') }}" href="{{ route('admin.items.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.item.items') }}</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.items.create') }}" href="{{ route('admin.items.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.item.create_item') }}</span>
            </a>
        </div>
    </div>
</div>

<!-- Products Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.products.*') }}">
    <span class="menu-link {{ is_active('admin.products.*') }}">
        <span class="menu-icon"><i class="bi bi-box-seam fs-2"></i></span> <!-- Icon for items -->
        <span class="menu-title">{{ trans('dashboard/admin.product.products') }}</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.products.index') }}" href="{{ route('admin.products.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.product.products') }}</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.products.create') }}" href="{{ route('admin.products.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">{{ trans('dashboard/admin.product.create_product') }}</span>
            </a>
        </div>
    </div>
</div>
