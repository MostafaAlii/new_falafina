<!DOCTYPE html>
<html lang="en">
    @if(app()->getLocale()=='ar')
		<html direction="rtl" dir="rtl" style="direction: rtl"> <!-- for arabic -->
	@else
		<html direction="ltr" dir="ltr" style="direction: ltr"> <!-- for en -->
	@endif
	<!--begin::Head-->
	<head><base href="">
		<title>@yield('pageTitle')</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="{{asset("assets/dashboard/media/logos/favicon.ico")}}" />
		<!--begin::Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Cairo:300,400&amp;subset=arabic,latin-ext" rel="stylesheet">
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
        @if(app()->getLocale()=='ar')  <!-- for arabic -->
			<!--begin::Page Vendor Stylesheets(used by this page)-->
			<link href="{{ asset("dashboard/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
			<link href="{{ asset("dashboard/assets/plugins/global/plugins.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
			<!--begin::Global Stylesheets Bundle(used by all pages)-->
			<link href="{{ asset("dashboard/assets/css/style.bundle.rtl.css") }}" rel="stylesheet" type="text/css" />
		@else
            <!--begin::Page Vendor Stylesheets(used by this page)-->
			<link href="{{ asset("dashboard/assets/plugins/global/plugins.bundle.css") }}" rel="stylesheet" type="text/css" />
			<!--begin::Global Stylesheets Bundle(used by all pages)-->
			<link href="{{ asset("dashboard/assets/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @endif
		<!--end::Global Stylesheets Bundle-->
        <style>
            html, body, a, i, p, h1, h2, h3, h4, h5, h6, table, .btn, .alert {font-family: 'Cairo', sans-serif;}
        </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{asset('assets/dashboard/media/illustrations/unitedpalms-1/14.png')}})">
