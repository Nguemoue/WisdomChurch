<!DOCTYPE html>

<html lang="{{LaravelLocalization::getCurrentLocale()}}">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

	<title>{{config('misc.espace.client')}}</title>

	<meta name="description" content="" />

	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		  rel="stylesheet"/>

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="{{asset('fonts/boxicons.css')}}" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="{{asset('_sneat/css/core.css')}}" class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{asset('_sneat/css/theme-default.css')}}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{asset('_sneat/css/demo.css')}}" />
	<link rel="stylesheet" href="{{asset('lib/iziToast/css/iziToast.css')}}">

	<!-- Vendors CSS -->
{{--	<link rel="stylesheet" href="{{asset('_core/lib/perfect-scrollbar/perfect-scrollbar.css')}}" />--}}
@stack("styles")


<!-- Page CSS -->

	<!-- Helpers -->
	<script src="{{asset('_sneat/js/helpers.js')}}"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="{{asset('_sneat/js/config.js')}}"></script>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
		<!-- Menu -->
	@includeIf("templates.dashboard._partials.web.sidebar")
	<!-- / Menu -->

		<!-- Layout container -->
		<div class="layout-page">
			<!-- Navbar -->

		@includeIf("templates.dashboard._partials.web.navbar")
		<!-- / Navbar -->

			<!-- Content wrapper -->
			<div class="content-wrapper">
				<!-- Content -->

				<div class="container-xxl flex-grow-1 container-p-y">
					{{$header}}
					{{$slot}}
				</div>
				<!-- / Content -->

				<!-- Footer -->
			@includeIf("templates.dashboard._partials.web.footer")
			<!-- / Footer -->
				<div class="content-backdrop fade"></div>
			</div>
			<!-- Content wrapper -->
		</div>
		<!-- / Layout page -->
	</div>

	<!-- Overlay -->
	<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script  src="{{asset('lib/iziToast/js/iziToast.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('_sneat/js/bootstrap.js')}}"></script>
<script src="{{asset('_sneat/js/menu.js')}}"></script>
<!-- endbuild -->
<!-- Main JS -->
<script src="{{asset('_sneat/js/main.js')}}"></script>
@stack("scripts")
@includeIf("templates.dashboard._partials.swalJs")
</body>
</html>
