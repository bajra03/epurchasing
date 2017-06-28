<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>EPurchasing | Login</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/sweetalert.css') }}">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,600" type="text/css">
</head>
<body>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<nav class="navbar navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="https://karmagroup.com"><img src="{{asset('/img/login.png')}}"></a>               
			</div>
		</div>
	</nav>

	<section id="login-content" class="bg-login-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-4 col-md-offset-4">  
					<div class="form-login">
						<div class="account-wall">
							<h1 class="text-center login-title text-uppercase">Sign in</h1>
							<form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
								<input type="password" class="form-control" placeholder="Password" name="password" required>
								<label class="checkbox pull-left"><input type="checkbox" value="remember-me">
									Remember me
								</label>
								<button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in"></i> Sign in</button> 
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer" class="footer">
		<div class="container">
			<div class="row contact-detail">
				<div class="col-xs-12 col-md-4 email">
					<i class="fa fa-envelope"></i>
					<span>putu.bajra@gmail.com</span>
				</div>
				<div class="col-xs-12 col-md-4 address">
						<i class="fa fa-map-marker"></i>
						<span>STIMIK STIKOM INDONESIA</span>
				</div>
				<div class="col-xs-12 col-md-4 text-center">Copyright @ 2016 Bajra, All right reserved.</div>
			</div>
		</div>
	</footer>

	@section('scripts')
		@include('layouts.partials.scripts')
	@show

</body>
</html>