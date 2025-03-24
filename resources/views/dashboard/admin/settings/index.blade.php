@extends('dashboard.layouts.master')

@section('pageTitle')
    الاعدادات العامه
@endsection

@section('content')
    @include('dashboard.layouts.common._partial.messages')
    <div id="kt_content_container" class="container-xxl">
        <div class="mb-5 card card-xxl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="pt-5 border-0 card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="mb-1 card-label fw-bolder fs-3">الاعدادات العامه</span>
                </h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="py-3 card-body">
                <!-- Start Content -->
                <form id="mainSettings" action="{{route('admin.mainSettings.store')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Start General Settings -->
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="input-group-text text-dark">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name',$setting?->name)}}">
                        </div>
                        <div class="col-md-6">
                            <label class="input-group-text text-dark">رقم الهاتف</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone',$setting?->phone)}}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col-md-6">
                            <label class="input-group-text text-dark">البريد الالكترونى</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email',$setting?->email)}}">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <div class="col-md-6">
                            <label class="input-group-text text-dark">العنوان</label>
                            <textarea class="form-control" id="address" name="address" rows="3">{{old('address',$setting?->address)}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="input-group-text text-dark">الوصف</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{old('description',$setting?->description)}}</textarea>
                        </div>
                    </div>

                    <!-- Start Logo & Favicon & Banner -->
                    <div class="container bg-white p-4 rounded shadow mt-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 text-center border p-3 rounded">
                                    <label for="logo" class="form-label fw-bold">الشعار (Logo)</label>
                                    <input class="form-control" type="file" name="logo" id="logoInput" accept="image/*">
                                    @if ($logo)
                                        <div class="mt-2">
                                            <img id="logoPreview" src="{{ $logo['original'] }}" alt="" width="100" style="display: {{ isset($logo['original']) ? 'block' : 'none' }}; cursor: pointer;" onclick="openImagePopup(this.src)">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-center border p-3 rounded">
                                    <label for="favicon" class="form-label fw-bold">الأيقونة (Favicon)</label>
                                    <input class="form-control" type="file" name="favicon" id="faviconInput" accept="image/*">
                                    @if ($favicon)
                                        <div class="mt-2">
                                            <img id="faviconPreview" src="{{ $favicon['original'] }}" alt="" width="100" style="display: {{ isset($favicon['original']) ? 'block' : 'none' }}; cursor: pointer;" onclick="openImagePopup(this.src)">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Name & alert message -->
                    <hr>
                    <div class="form-row">
                        <div class="text-center col-md-12">
                            <button type="submit" class="btn btn-success btn-lg">تحديث</button>
                        </div>
                    </div>
                    <!-- End Submit Form -->
                </form>
                <!-- End Content -->
            </div>
            <!--begin::Body-->
        </div>
    </div>
@endsection

@push('js')
<script>
    function previewImage(inputId, previewId) {
        let input = document.getElementById(inputId);
        let preview = document.getElementById(previewId);
        input.addEventListener("change", function () {
            let file = input.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = "none";
            }
        });
    }

    function openImagePopup(src) {
        let popup = document.getElementById("imagePopup");
        let popupImage = document.getElementById("popupImage");
        popupImage.src = src;
        popup.classList.add("show");
        popup.style.display = "flex";

    }

    document.getElementById("imagePopup").addEventListener("click", function (event) {
        if (event.target !== document.getElementById("popupImage")) {
            let popup = document.getElementById("imagePopup");
            popup.classList.remove("show");
            setTimeout(() => {
                popup.style.display = "none";
            }, 400);
        }
    });
    previewImage("logoInput", "logoPreview");
    previewImage("faviconInput", "faviconPreview");
    previewImage("bannerInput", "bannerPreview");
</script>
@endpush
