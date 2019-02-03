{{--@extends('layouts.app')--}}

{{--@section('content')--}}
 {{----}}
{{--<body class="page-login layout-full page-dark">--}}
{{--<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"--}}
	{{--data-animsition-out="fade-out">--}}
	{{----}}
	{{--<div class="page-content vertical-align-middle" style="background: rgba(40, 41, 41, 0.17);">--}}
      {{--<div class="brand">--}}
	  {{--<img class="navbar-brand-logo" style="height:120px" src="{{URL::to('/images/login_logo.png')}}" title="faleh logo"/>--}}
        {{--<h2 class="brand-text"> {{trans('app.scoutspace')}}</h2>--}}
      {{--</div>--}}
      {{--<p> {{ trans('app.sing_into_your_pages_account')}}</p>--}}
       {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
                        {{--{{ csrf_field() }}         --}}
		 {{----}}
		{{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
					{{----}}
						{{--<input  style="    font-family: Arial,Segoe UI, Tahoma, Geneva, Verdana,sans-serif !important;" id="email" type="text" class="form-control" placeholder="{{ trans('app.login_creds')}}" name="email" value="{{ old('email') }}" required>--}}

						{{--@if ($errors->has('email'))--}}
							{{--<span class="help-block">--}}
								{{--<strong>{{ $errors->first('email') }}</strong>--}}
							{{--</span>--}}
						{{--@endif					--}}
				{{--</div>--}}
			{{----}}
		 {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">			--}}
				{{--<input id="password"  style="    font-family: Arial,Segoe UI, Tahoma, Geneva, Verdana,sans-serif !important;" type="password" required class="form-control" name="password" placeholder="{{ trans('app.password')}}">--}}

				{{--@if ($errors->has('password'))--}}
					{{--<span class="help-block">--}}
						{{--<strong>{{ $errors->first('password') }}</strong>--}}
					{{--</span>--}}
				{{--@endif--}}
		{{--</div>--}}
		{{----}}
          {{--<div class="form-group clearfix">--}}
		 {{----}}
            {{--<div class="checkbox-custom checkbox-inline checkbox-primary pull-right">--}}


              {{--<input type="checkbox" id="remember" name="checkbox" title="remember">--}}
				{{--<label ></label>--}}
            {{--</div>--}}
			  {{--<span class="pull-right" style="margin-right:5px;margin-top:5px">{{ trans('app.remember_me')}}<span style="font-family: Arial,Segoe UI, Tahoma, Geneva, Verdana,sans-serif !important;">{{trans('app.question_mark')}}</span></span>--}}


			  {{--<a class="pull-left" style="margin-top:5px" href="{{ url('/password/reset') }}">{{ trans('app.forget_password')}} <span style="font-family: Arial,Segoe UI, Tahoma, Geneva, Verdana,sans-serif !important;">{{trans('app.question_mark')}}</span></a>--}}
			  {{----}}
			{{----}}
		  {{--</div>--}}
          {{--<!--<button type="submit" class="btn btn-primary btn-block" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Loading..">{{ trans('app.sign_in')}}</button>-->--}}
        {{----}}
		{{--<button type="submit" class="btn btn-primary ladda-button btn-block" data-plugin="ladda" data-style="expand-left">--}}
			  {{--{{ trans('app.sign_in')}}--}}
		{{--<span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0;"></div>--}}
		{{--</button>--}}
		{{----}}
		{{--</form>--}}
		 {{--<!--p>{{ trans('app.still_no_account_please_go_to')}} <a href="{{ url('/register') }}"> {{ trans('app.register')}} </a></p-->--}}
      {{--<!--footer style="padding:20px">          --}}
          {{--<div class="social">           --}}
            {{--<a class="btn btn-icon btn-round social-facebook" href="{{ url('/redirect/facebook') }}">--}}
              {{--<i class="icon bd-facebook" aria-hidden="true"></i>--}}
            {{--</a>--}}
            {{--<a class="btn btn-icon btn-round social-google-plus" href="{{ url('/redirect/google') }}">--}}
              {{--<i class="icon bd-google-plus" aria-hidden="true"></i>--}}
            {{--</a>--}}
			 {{--<a class="btn btn-icon btn-round social-twitter" href="{{ url('/redirect/twitter') }}">--}}
              {{--<i class="icon bd-twitter" aria-hidden="true"></i>--}}
            {{--</a>--}}
          {{--</div>--}}
        {{--</footer-->--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
		<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('/login/images/img-01.jpg');">
		<div class="wrap-login100 p-t-190 p-b-30">
			<form class="login100-form validate-form">
				<div class="login100-form-avatar">
					<img src="login/images/avatar-01.jpg" alt="AVATAR">
				</div>

				<span class="login100-form-title p-t-20 p-b-45">
						John Doe
					</span>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
					<input class="input100" type="text" name="username" placeholder="Username">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
				</div>

				<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
					<input class="input100" type="password" name="pass" placeholder="Password">
					<span class="focus-input100"></span>
					<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
				</div>

				<div class="container-login100-form-btn p-t-10">
					<button class="login100-form-btn">
						Login
					</button>
				</div>

				<div class="text-center w-full p-t-25 p-b-230">
					<a href="#" class="txt1">
						Forgot Username / Password?
					</a>
				</div>

				<div class="text-center w-full">
					<a class="txt1" href="#">
						Create new account
						<i class="fa fa-long-arrow-right"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>




<!--===============================================================================================-->
<script src="login/lvendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/bootstrap/js/popper.js"></script>
<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="login/js/main.js"></script>

</body>
</html>