<!DOCTYPE html>
<html lang="en" style="background: none;">
<head>
	<title>@yield('title')</title>	 
	<link rel="preload" as="font" href="/font/montserrat/Montserrat-Regular.ttf" type="font/ttf" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<meta name="description" content="This the OpenICEA Administrator Dashboard">
	<meta name="author" content="Infectious Diseases Institute">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel='icon' href="{{url('images/favicon.png')}}" type='image/x-icon'/>
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<script src="{{url('js/jquery.min.js')}}"></script>
	<link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" />
	
	<link rel="stylesheet" href="{{url('css/menu.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
	<link rel="stylesheet" href="{{url('css/registration.css')}}">
	<link rel="stylesheet" href="{{url('css/multiple-select.css')}}">
	<script src="{{url('js/jquery-ui.min.js')}}"></script>


	@yield('links')
	<script src="{{url('js/popper.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>	
	<script src="{{url('src/jquery.bootstrap-duallistbox.js')}}"></script>
	<script src="{{url('js/moment.js')}}"></script>
	<script src="{{url('js/jspdf/jspdf.debug.js')}}"></script>
	<script type="module" src="{{url('js/jspdf/modules/html.js')}}"></script>
	<script type="module" src="{{url('js/jspdf/DOMPurify.js')}}"></script>

	<!-- @toastr_css -->
	<link rel="stylesheet" href="{{url('css/toastr.min.css')}}">
	<link rel="stylesheet" href="{{url('css/pretty-checkbox.min.css')}}">
	<link rel="stylesheet" href="{{url('css/bootstrap-datetimepicker.min.css')}}">
	<script src="{{url('js/bootstrap-datetimepicker.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{url('src/bootstrap-duallistbox.css')}}">
	
	<!-- Charts -->
	<script src="{{url('js/highcharts.js')}}"></script>
	<script src="{{url('js/highcharts-3d.js')}}"></script>
	<script src="{{url('js/exporting.js')}}"></script>
	<script src="{{url('js/export-data.js')}}"></script>
	<script src="{{url('js/accessibility.js')}}"></script>
	<!-- Table-->

	<link rel="stylesheet" type="text/css" href="css/table/animate.css">
	<link rel="stylesheet" type="text/css" href="css/table/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/table/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/table/util.css">
	<link rel="stylesheet" type="text/css" href="css/table/main.css">

	<style>
		input[type="checkbox"][readonly] {
		  pointer-events: none;
		}

		.alert {
		    width: 50vw;
		    text-align: center;
		}
		.dropdown {
		  position: relative;
		  display: inline-block;
		}

		.dropdown-content {
		  	display: none;
		  	position: absolute;
		  	background-color: #f9f9f9;
		  	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		  	padding: 12px 0px;
		  	z-index: 1;
		 	min-width: 230px !important;
		  	right: -10px;
   			/*margin-top: 10px;*/
		}

		.dropdown:hover .dropdown-content {
		  display: block;
		}

		.dropdown-content li{
			min-width: 120px;
			font-size: 0.8em;
			border:none !important;
			display: flex;
			padding: 5px 20px;
/*			margin: 0 10px;*/
		}

		.dropdown-content li:hover{
			background:#f2f2f2;
		}

		.dropdown-content img{
			/*width: 15%;*/
    		height: 30px;

		}
		.dropdown-content span{
			font-size:0.9em;
			margin: 5px 20px;
			text-align: left;
		}
		

		.dropdown-content .navbar-nav {
		    flex-direction: column !important;
		    margin-left: 0 !important;
		}

		.dropdown-content .nav-link{
		    padding:none !important;
		    width: 100% !important;
		    display: flex;
    		padding: 0;
		}

		hr {
		    min-width: 230px;
		    margin-top: 0.5rem;
    		margin-bottom: 0.5rem;
		}
		.container-fluid{
			background-color:#ffffff !important;
		}
		
	</style>
	<!-- for patient menu-->
	
	<!-- for patient menu-->


</head>
<body id="page-top">