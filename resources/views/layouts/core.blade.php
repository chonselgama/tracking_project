<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ config('app.name') }} - Dashboard</title>
	<link href="{{asset('lumino/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('lumino/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('lumino/css/datepicker3.css')}}" rel="stylesheet">
	<link href="{{asset('lumino/css/styles.css')}}" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Mon</span>Courrier</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<!-- <div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div> -->
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>En ligne</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<li @if(Route::is('admin')) class="active" @endif><a href="/admin"><em class="fa fa-home">&nbsp;</em>Dashboard</a></li>
			<li @if(Route::is('getForm')) class="active" @endif><a href="/get"><em class="fa fa-pencil-square-o">&nbsp;</em>Enregistrer colis</a></li>
			<li @if(Route::is('print')) class="active" @endif><a href="/print"><em class="fa fa-envelope-o">&nbsp;</em>Consulter colis</a></li>
			<li><a href="/register"><em class="fa fa-user-plus">&nbsp;</em>Ajouter un Admin</a></li>
			<li><a href="{{ route('logout') }}"><em class="fa fa-power-off">&nbsp;</em>Se deconnecter</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		@if(session('Sucess'))
			<div class="alert alert-success" role="alert">
				{{ session('Sucess') }}
			</div>
		@endif

		
		@yield('content')
		
	
	</div>	<!--/.main-->

	

	<script src="{{asset('lumino/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('lumino/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('lumino/js/chart.min.js')}}"></script>
	<script src="{{asset('lumino/js/chart-data.js')}}"></script>
	<script src="{{asset('lumino/js/easypiechart.js')}}"></script>
	<script src="{{asset('lumino/js/easypiechart-data.js')}}"></script>
	<script src="{{asset('lumino/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{asset('lumino/js/custom.js')}}"></script>
	@yield('script')
</body>
</html>