<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="{{asset('/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('/frontend/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('/frontend/rate/css/rate.css')}}" rel="stylesheet">

	
    <script src="{{asset('/frontend/js/jquery.js')}}"></script>

	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('/frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <script>
        if(screen.width <= 736){
            document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }
    </script>
</head>
<body>
	@include('frontend.layout.Header')
	@Yield('slide', View::make('frontend.layout.Slide'))
	<section> 
		<div class="container">
			<div class="row">
				@Yield('sidebar', View::make('frontend.layout.MenuLeft'))
				<div class="col-sm-9 padding-right">
					@Yield('content')
				</div>
			</div>
		</div>
	</section>
	@include('frontend.layout.Footer')

	<script src="{{asset('/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('/frontend/js/main.js')}}"></script>
</body>
</html>