<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <style>
        .btn-outline-primary.btn-custom {
            color: #00cc00;
            background-color: transparent;
            background-image: none;
            border-color: #00cc00;
        }

        .btn-outline-primary.btn-custom:hover {
            color: #fff;
            background-color: #00cc00;
            border-color: #00cc00;
        }

        .btn-outline-primary.btn-custom:focus, .btn-outline-primary.btn-custom.focus {
            box-shadow: 0 0 0 0.2rem rgba(34, 255, 111, 0.39);
        }

        .btn-outline-primary.btn-custom.disabled, .btn-outline-primary.btn-custom:disabled {
            color: #00cc00;
            background-color: transparent;
        }

        .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active,
        .show > .btn-outline-primary.btn-custom.dropdown-toggle {
            color: #fff;
            background-color: #00cc00;
            border-color: #00cc00;
        }

        .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active:focus, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active:focus,
        .show > .btn-outline-primary.btn-custom.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(34, 255, 111, 0.39);
        }
    </style>
</head>
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    <!-- Masthead -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('{{asset('images/slide/slide f.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('images/slide/slide 2.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('images/slide/slide 3.jpg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- events Showcases -->
    <div class="container mt-3 center" >
        <h3 class="center text-center">آخر اخبارنا</h3>
        <div class="row">
            <div class="col">
                <div class="card-deck-wrapper">
                    <div class="card-deck">
                        @if($events->count()>0)
                            @foreach($events as $event)
                                <div class="card" style="">
                                    <div class="card-content">
                                        <div class="card-header" style="background-color: #00cc00;">
                                            <h4 class="card-title text-right text-white">{{$event->title}}</h4>
                                            <h6 class="card-subtitle text-right text-white">{{$event->location}}</h6>
                                        </div>
                                        <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/EventImages/'.$event->event_image)}}" alt="{{$event->title}}">
                                        <div class="card-body">
                                            <p class="card-text">{!!  $event->description !!}</p>
                                            <a href="#" align="right" class="card-link btn btn-outline-primary btn-custom float-right m-3 text-right">اقرأ اكثر</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="center" style="width: 10%; margin: 10px auto;"  >{{$events->links("pagination::bootstrap-4")}}</div>
    </div>
@endsection
