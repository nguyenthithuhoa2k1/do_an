<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/assets/images/favicon.png') }}">
    <title>Nice admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Nice admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
</head>
<body>
     <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">


    @include('admin.layout.Hearder')
    @include('admin.layout.Aside')
	<div class="page-wrapper">
		@Yield('content')
	</div>


	<script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('admin/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('admin/dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{ asset('admin/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/dist/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
</body>
</html>