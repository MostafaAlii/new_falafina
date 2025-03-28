<div class="menu-item">
    <div class="pb-2 menu-content">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ check_guard()->name . ' | ' . $settings?->name }} </span>
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
<!-- Main Setting Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.mainSettings.*') }}">
    <span class="menu-link {{ is_active('admin.mainSettings.*') }}">
        <span class="menu-icon"><i class="bi bi-person fs-2"></i></span>
        <span class="menu-title">الاعدادات العامه</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.mainSettings.index') }}" href="{{ route('admin.mainSettings.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">الاعدادات العامه</span>
            </a>
        </div>
    </div>
</div>
<!-- Sliders -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.sliders.*') }}">
    <span class="menu-link {{ is_active('admin.sliders.*') }}">
        <span class="menu-icon"><i class="bi bi-list fs-2"></i></span>
        <span class="menu-title">الصور المتحركه</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.sliders.index') }}" href="{{ route('admin.sliders.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">الصور المتحركه</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.sliders.create') }}" href="{{ route('admin.sliders.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">إضافة صوره</span>
            </a>
        </div>
    </div>
</div>
<!-- Addons Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.extras.*') }}">
    <span class="menu-link {{ is_active('admin.extras.*') }}">
        <span class="menu-icon"><i class="bi bi-list fs-2"></i></span>
        <span class="menu-title">الاضافات و الصوصات</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.extras.index') }}" href="{{ route('admin.extras.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">الاضافات و الصوصات</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.extras.create') }}" href="{{ route('admin.extras.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">إضافة صوص او اضافه</span>
            </a>
        </div>
    </div>
</div>
<!-- Types Menu -->
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.types.*') }}">
    <span class="menu-link {{ is_active('admin.types.*') }}">
        <span class="menu-icon"><i class="bi bi-list fs-2"></i></span>
            <span class="menu-title">الانواع</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.types.index') }}" href="{{ route('admin.types.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">الانواع</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.types.create') }}" href="{{ route('admin.types.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">إضافة نوع</span>
            </a>
        </div>
    </div>
</div>
<!-- Types Menu -->
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
        <span class="menu-title">التصنيفات</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.categories.index') }}" href="{{ route('admin.categories.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">التصنيفات</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.categories.create') }}" href="{{ route('admin.categories.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">إضافة تصنيف</span>
            </a>
        </div>
    </div>
</div>

<!-- Sizes Menu -->
{{--<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ is_active('admin.sizes.*') }}">
    <span class="menu-link {{ is_active('admin.sizes.*') }}">
        <span class="menu-icon"><i class="bi bi-rulers fs-2"></i></span>
        <span class="menu-title">السمات</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.sizes.index') }}" href="{{ route('admin.sizes.index') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">السمات</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ is_active('admin.sizes.create') }}" href="{{ route('admin.sizes.create') }}">
                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                <span class="menu-title">اضافه سمه</span>
            </a>
        </div>
    </div>
</div>--}}

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
