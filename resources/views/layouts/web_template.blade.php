<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="{{ asset('assets/css/landing-page.min.css')}}" rel="stylesheet">
        <link rel='stylesheet prefetch' href='/css/bootstrap2.min.css'>

        <link rel="stylesheet" href="css/style.css">
    	<script src="{{ asset('js/jquery.min.js') }}"></script>
    
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> فوج الفلاح  </title>

    </head>
    <body>
        <div id="app">
            @include("includes.navbar")
            <main>
                @yield('content')
            </main>
        </div>
            @include("includes.footer")
            <script src='/js/jquery2.min.js'></script>
            <script src='/js/bootstrap2.min.js'></script>
            <script  src="js/index.js"></script>
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>
