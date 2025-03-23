@extends('dashboard.layouts.master')

@section('pageTitle')
    {{ trans('dashboard/admin.item.edit_item') }}
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <div class="mb-5 card card-xxl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="pt-5 border-0 card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="mb-1 card-label fw-bolder fs-3">{{ trans('dashboard/admin.item.edit_item') }}</span>
                </h3>
            </div>
            <!--end::Header-->

            <!--begin::Form-->
            <div class="py-3 card-body">
                @include('dashboard.admin.items.partials.form', [
                    'action' => route('admin.items.update', $item->id),
                    'method' => 'PUT',
                    'item' => $item, // Pass the item data for edit
                    'itemTypes' => $itemTypes, // Pass item types for the dropdown
                ])
            </div>
            <!--end::Form-->
        </div>
    </div>
    @push('js')
        <script>
            document.getElementById("itemInput").addEventListener("change", function(event) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("imagePreview").src = e.target.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            });
        </script>
    @endpush
@endsection
