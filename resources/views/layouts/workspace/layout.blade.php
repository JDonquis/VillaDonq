<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield("title","Workspace")</title>
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{asset("assets/LTE/plugins/fontawesome-free/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
	<link rel="stylesheet" href="{{asset("assets/LTE/dist/css/adminlte.min.css")}}">
	<link rel="stylesheet" href="{{ asset('assets/css/workspace/general.css') }}">
	 @yield('styles','')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

	
	@include("includes.message_confirmation")

	@include("includes.message_error")

	<div class="wrapper">

		@include("includes.loader")

	{{-- Header --}}

		@include("layouts.workspace.header")

	{{-- //Header --}}
		 <section class="content">

		 		@yield("main-content")


		 </section>	


	{{-- Footer --}}

		

	{{-- //Footer --}}	
	</div>

	@include("layouts.workspace.footer")

	<script src="{{asset("assets/LTE/plugins/jquery/jquery.min.js")}}"></script>
	<script src="{{asset("assets/LTE/dist/js/adminlte.min.js")}}"></script>
	<script src="{{asset("js/app.js")}}"></script>

	@yield("scripts","")
</body>
</html>




 


 

<!-- jQuery -->
{{-- <script src="plugins/jquery/jquery.min.js"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="dist/js/adminlte.min.js"></script> --}}

