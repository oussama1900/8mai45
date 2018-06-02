<!-- this is the main layout for our website , all of our pages will have this format -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
        <title>{{config('app.name','Falah')}}</title>

        <!-- this is the compiled css file that was made from all of the scss files we made,
                it also contains the bootstrap css code -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        

    </head>

    <!-- this is the body of all our pages -->
    <body>

        <!-- this is the navbar we are using -->
        @include("includes.navbar")

        <!-- this is where all of the content of our pages will be shown -->
        <div class="container">
            <!-- this is the conent section -->
            @yield('content')
        </div>

        <!-- this is the compiled js file that was made from all of the js files we made,
                it also contains the bootstrap js code and the jquery and all of the needed dependencies-->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
