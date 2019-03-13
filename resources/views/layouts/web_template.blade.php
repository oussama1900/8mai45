<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Custom css -->
        <link href="{{ asset('/css/nav.css') }}" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.css') }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/flipclock.css') }}" />
        <!-- Website icon -->
        @yield('icon')
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

        <script src="/js/jquery.filterizr.min.js"></script>
        <script src="{{ asset('js/share.js') }}"></script>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('og')
        @yield('title')
        <link href='{{ url('/eventsFeed') }}' rel='alternate' title='RSS' type='application/rss+xml'/>
        <link href='{{ url('/postsFeed') }}' rel='alternate' title='RSS' type='application/rss+xml'/>

        <style>
            @font-face {
                font-family: "Alarabiya Font";
                src: url("/Alarabiya-Font.ttf");
            }
            *:not(.fa){
                font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
        <script>
            window.addEventListener("load", function(){
                window.cookieconsent.initialise({
                    "palette": {
                        "popup": {
                            "background": "#edeff5",
                            "text": "#838391"
                        },
                        "button": {
                            "background": "#4b81e8"
                        }
                    },
                    "theme": "classic",
                    "content": {
                        "message": "يستخدم هذا الموقع ملفات تعريف الارتباط لضمان حصولك على أفضل تجربة على موقعنا.",
                        "dismiss": "أقبل",
                        "link": "اقرأ أكثر"
                    }
                })});
        </script>
    </head>
    <body style="overflow-x:hidden">
        <div id="app">
            @include("includes.new_navbar")
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
