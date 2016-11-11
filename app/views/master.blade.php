<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SafeTronics WS Client</title>
	<meta name="description" content="Page built for a SafeTronics rest web service client">
	<meta name="author" content="Milanko Topolski">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Bootstrap files -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->

	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
</head>
<body>

	<!-- NAVBAR -->
	<nav class="navbar navbar-inverse" id="main-navbar" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="/" class="navbar-brand">SafeTronics WS Client</a>
			</div> <!-- end navbar-header -->

			<div class="collapse navbar-collapse" id="navbar-collapse">
				@if(Session::get('auth'))
          			<a href="{{URL::to('logout')}}" class="btn btn-primary navbar-btn navbar-right">Log out</a>
          			<ul class="nav navbar-nav">
          				@if(Session::has('meni'))
          					@foreach(Session::get('meni') as $m)
								<li><a href="{{$m['putanja']}}">{{$m['naziv']}}</a></li>
							@endforeach
            			@endif
					</ul>
        		@else
          			<a href="{{URL::to('login')}}" class="btn btn-primary navbar-btn navbar-right">Log in</a>
        		@endif
			</div> <!-- end collapse -->
		</div> <!-- end container -->
	</nav>

	<!-- MAIN CONTAINER -->
	<div class="container">
		<section>
			<div class="page-header">
				<div class="row">
					@yield('header')
				</div>
			</div>
			@if(Session::has('message'))
			  <div class="alert alert-success">
				{{Session::get('message')}}
			  </div>
			@endif
			@if(Session::has('error'))
			  <div class="alert alert-danger">
				{{Session::get('error')}}
			  </div>
			@endif
			<div class="row">
				@yield('content')
			</div>
		</section>

		<!-- FOOTER -->
		<footer>
			<hr>
			<div class="container text-center">
				<p>&copy; 2014 by Milanko Topolski, 1047/13. Visoka ICT </p>
			</div> <!-- end container -->
		</footer>
	</div>

	<!-- Latest compiled and minified JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>