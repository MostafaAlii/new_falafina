@extends('dashboard.layouts.master')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
@endsection

@section('pageTitle')
    {{$pageTitle}}
@endsection

@section('content')
    @include('dashboard.layouts.common._partial.messages')
    <div id="kt_content_container" class="container-xxl">
        <div class="mb-5 card card-xxl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="pt-5 border-0 card-header">
                <h3 class="card-title align-items-start flex-column">
                    <span class="mb-1 card-label fw-bolder fs-3">{{$pageTitle}}</span>
                    <span class="mt-1 text-muted fw-bold fs-7">{{$pageTitle}} ( {{Branch::count();}} )</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="py-3 card-body">
                <form action="{{ route('admin.branches.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">اسم الفرع:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">هاتف الفرع:</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="search" class="form-label">ابحث عن الموقع:</label>
                        <input type="text" id="search" class="form-control" placeholder="اكتب اسم الشارع أو المنطقة">
                    </div>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <div class="mt-4" style="width: 100%; max-width: 100%; height: 400px; overflow: hidden; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                        <div id="map" style="width: 100%; height: 100px;"></div>
                    </div>
                    <button type="submit" class="btn btn-success w-100">حفظ الفرع</button>
                </form>
            </div>
            <!--begin::Body-->
        </div>
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
{{--<script>
    var map = L.map('map').setView([30.0444, 31.2357], 7); // القاهرة كموقع افتراضي

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker = L.marker([30.0444, 31.2357], {draggable: true}).addTo(map);

    function updateLatLng(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    }

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        updateLatLng(position.lat, position.lng);
    });

    map.on('click', function(event) {
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;
        marker.setLatLng([lat, lng]);
        updateLatLng(lat, lng);
    });

    // البحث عن موقع وتحريك العلامة تلقائيًا
    document.getElementById('search').addEventListener('change', function() {
        var location = this.value;
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var lat = data[0].lat;
                    var lng = data[0].lon;
                    marker.setLatLng([lat, lng]);
                    map.setView([lat, lng], 15);
                    updateLatLng(lat, lng);
                } else {
                    alert("لم يتم العثور على الموقع");
                }
            });
    });
</script>--}}
<script>
    var map = L.map('map').setView([30.0444, 31.2357], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);
    var customIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/2776/2776067.png',
        iconSize: [38, 38],
        iconAnchor: [19, 38],
        popupAnchor: [0, -38]
    });

    var marker = L.marker([30.0444, 31.2357], {
        draggable: true,
        icon: customIcon
    }).addTo(map);
    function updateLatLng(lat, lng) {
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
        fetchAddress(lat, lng);
    }

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        updateLatLng(position.lat, position.lng);
    });

    map.on('click', function(event) {
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;
        marker.setLatLng([lat, lng]);
        updateLatLng(lat, lng);
    });
    function fetchAddress(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&accept-language=ar`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    document.getElementById('search').value = data.display_name;
                } else {
                    document.getElementById('search').value = "لم يتم العثور على عنوان";
                }
            })
            .catch(error => console.error('خطأ في جلب العنوان:', error));
    }
    document.getElementById('search').addEventListener('change', function() {
        var location = this.value;
        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${location}&accept-language=ar`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var lat = data[0].lat;
                    var lng = data[0].lon;
                    marker.setLatLng([lat, lng]);
                    map.setView([lat, lng], 15);
                    updateLatLng(lat, lng);
                } else {
                    alert("لم يتم العثور على الموقع");
                }
            });
    });
</script>
@endpush
