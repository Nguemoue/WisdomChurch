<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Katana | Administration</title>
    <!-- plugins:css -->
{{--    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">--}}
    <!-- endinject -->
    <!-- Plugin css for this page -->
{{--    <link rel="stylesheet" href="{{asset("vendors/jvectormap/jquery-jvectormap.css")}}" />--}}
{{--    <link rel="stylesheet" href="{{asset('vendors/flag-icon-css/css/flag-icon.min.css')}}"/>--}}
{{--    <link rel="stylesheet" href="{{asset('vendors/owl-carousel-2/owl.carousel.min.css')}}"/>--}}
{{--    <link rel="stylesheet" href="{{asset('vendors/owl-carousel-2/owl.theme.default.min.css')}}"/>--}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300&family=Roboto&display=swap" rel="stylesheet">
    @stack("styles")
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="" />
	<style>
		body{
			font-family: 'Merienda','Borel',"Roboto" , sans-serif;
		}
		input,textarea{
			color:white !important;
		}
	</style>
</head>

<body>
    <div class="container-scroller">

        @includeIf('admin._partials.admin_navbar')
        @includeIf('admin._partials.sidebar')
        <!-- start body container -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield("main")

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <!-- plugins:js -->
{{--    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>--}}
    <!-- endinject -->

    <!-- Plugin js for this page -->
{{--    <script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>--}}
{{--    <script src="{{asset('vendors/progressbar.js/progressbar.min.js')}}"></script>--}}
{{--    <script src="{{asset('vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>--}}
    {{-- <script src="/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script> --}}
    {{-- <script src="{{asset('assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script> --}}
    <!-- End plugin js for this page -->

    <!-- inject:js -->
	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/scripts/verify.min.js"></script>
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    {{-- <script src="/js/settings.js"></script> --}}
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{asset('js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->
    @stack("scripts")

</body>

</html>
