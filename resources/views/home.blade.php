<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')

<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    <!-- Masthead -->
    <header class="masthead text-white text-center" style="background: url('{{asset('images/slide/slide 2.jpg')}}') no-repeat center center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">الكشافة الاسلامية الجزائرية </br>  فوج الفلاح</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- events Showcases -->
    <div class="container mt-3 center">
        <h3 class="center text-center">آخر اخبارنا</h3>
        <div class="row">
            <div class="col">
                <div class="card-deck-wrapper">
                    <div class="card-deck">
                        @if($events->count()>0)
                            @foreach($events as $event)
                                <div class="card" style="">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$event->title}}</h4>
                                            <h6 class="card-subtitle text-muted">{{$event->location}}</h6>
                                        </div>
                                        <img class="img-fluid hoverZoomLink" src="{{asset('images/EventImages/'.$event->event_image)}}" alt="{{$event->title}}">
                                        <div class="card-body">
                                            <p class="card-text">{{$event->description}}</p>
                                            <a href="#" class="card-link pink">اقرأ اكثر</a>
                                            <a href="#" class="card-link pink">شيئ اخر</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
