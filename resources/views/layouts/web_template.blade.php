<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom css -->
        <link href="{{ asset('assets/css/navbar.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/flipclock.css') }}" />
        <!-- Website icon -->
        <link rel="icon"
              type="image/png"
              href="https://upload.wikimedia.org/wikipedia/en/thumb/6/69/Algerian_Muslim_Scouts.svg/1200px-Algerian_Muslim_Scouts.svg.png">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->

        <link href="{{ asset('assets/css/full-slider.css')}}" rel="stylesheet">
    	<script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/filter-gallery.js') }}"></script>

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
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/flipclock.min.js') }}"></script>
        <script src="{{ asset('assets/js/capJs.js') }}"></script>
    </body>

</html>
