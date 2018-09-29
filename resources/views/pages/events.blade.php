@extends('layouts.web_template')

<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    @php
        $card_color = '#2b53ce';
        $news_style = 'style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;"';

       if (Route::currentRouteNamed('cubs')){
           $card_color = '#ffd700';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #FDEB71, #F8D800); radius: 5px;"';
       }
       if (Route::currentRouteNamed('scout')){
           $card_color = '#00cc00';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #FFF720, #3CD500); radius: 5px;"';
       }

       if (Route::currentRouteNamed('advanced_scout')){
           $card_color = '#701700';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #F05F57, #360940); radius: 5px;"';
       }

       if (Route::currentRouteNamed('traveler')){
           $card_color = '#ee2c2c';
           $news_style = 'style="background-image: linear-gradient(to bottom right, #FEB692, #EA5455); radius: 5px;"';
       }
    @endphp
    <head>
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
        <style>
            .btn-outline-primary.btn-custom {
                color: #2b53ce !important;
                background-color: transparent;
                background-image: none;
                border-color: #2b53ce !important;;
            }

            .btn-outline-primary.btn-custom:hover {
                color: #fff !important;
                background-image: linear-gradient(to bottom right, #52E5E7, #130CB7);
                border-color: #ffffff !important;;
            }

            .btn-outline-primary.btn-custom:focus, .btn-outline-primary.btn-custom.focus {
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
            }

            .btn-outline-primary.btn-custom.disabled, .btn-outline-primary.btn-custom:disabled {
                color: #fff !important;;
                background-color: transparent;
            }

            .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active,
            .show > .btn-outline-primary.btn-custom.dropdown-toggle {
                color: #fff !important;
                background-image: linear-gradient(to bottom right, #52E5E7, #130CB7) !important;;
            }

            .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active:focus, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active:focus,
            .show > .btn-outline-primary.btn-custom.dropdown-toggle:focus {
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
            }
            .card-img span {
                position:absolute;
                top: 5%;
                right: 0%;
                background: #2b53ce !important;;
                padding: 6px;
                color: #fff !important;;
                font-size: 12px;
                border-radius: 4px;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                -ms-border-radius: 4px;
                -o-border-radius: 4px;

            }
            .card-img span h4{
                color: #ffffff;
                font-size: 12px;
                margin:0;
                padding:10px 5px;
                line-height: 0;
            }

            .owl-prev, .owl-next {
                background-image: linear-gradient(to bottom right, #52E5E7, #130CB7) !important;
                opacity: 0;
            }

            .flip-clock-label {
                font-size: 40px !important;
                color: white !important;
                text-shadow: 3px 2px black !important;
            }
        </style>
    </head>

    <!-- Owl Carousel 1 -->
    <div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
    @php
        $i=0;
    @endphp
    @foreach($events as $event)
        <!-- ARTICLE -->
            <article class="article thumb-article">
                <div class="article-img">
                    <img style="background-image: url('{{asset('images/EventImages/'.$event->event_image)}}');background-position: center;background-repeat: no-repeat;background-size:cover; height: 100%;" src="/images/cover.png" alt="{{$event->title}}">
                </div>
                <div class="article-body" align="right">
                    <ul class="article-info">
                        <li class="article-type" ><i class="fa fa-camera"></i></li>
                        <li class="article-category" ><a style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;" href="#">{{ $event->type }}</a></li>
                    </ul>
                    <h2 class="article-title"><a href="/events/{{$event->event_id}}">{{$event->title}}</a></h2>
                    <ul class="article-meta">
                        <li>{{$event->event_time, 0, 10}} <i class="fa fa-clock-o"></i></li>
                    </ul>
                </div>
                <div class="clock{{ $event->event_id }}c" style="width: auto;zoom: 0.6;position: absolute;left: 75px;top: 500px">
                    @php
                        $earlier = new DateTime();
                        $later = new DateTime(substr($event->event_time, 0, 10));
                        $diff = $later->diff($earlier)->format("%a");
                    @endphp
                    @if($diff == 0)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;">سيتم هاذا النشاط اليوم</h1>
                    @endif
                    @if($diff == 1)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط غدا </h1>
                    @endif
                    @if($diff == 2)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط بعد يومين </h1>
                    @endif
                    @if($diff > 2 && $diff <= 10)
                            <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط بعد  {{ $diff }} ايام </h1>
                    @endif
                    @if($diff > 10)
                        <h1 class="" style="font-size: 50px;color: white;text-shadow: 3px 2px black;"> سيتم هاذا النشاط بعد  {{ $diff }} يوم </h1>
                    @endif
                </div>
            </article>
            <!-- /ARTICLE -->
            @php
                $i++;
            @endphp
            @if($i==3)
                @break
            @endif
        @endforeach
    </div>
    <!-- /Owl Carousel 1 -->
    <div class="card shadow m-lg-5">
        <div class="card-header" {!! $news_style !!}>
            <h3 class="center text-center" style="color: #ffffff;">نشاطاتنا القادمة</h3>
        </div>
        <div class="container-fluid border" align="right">
            <div class="btn-group-toggle btn-group-block" data-toggle="buttons">
                <label class="btn btn-outline-primary btn-custom category-button" data-filter = "cap">
                    <input type="radio" name="options" id="option2"  autocomplete="off">القادة
                </label>

                <label class="btn btn-outline-primary btn-custom category-button" data-filter = "tvlr">
                    <input type="radio" name="options" id="option2"  autocomplete="off">الجوالة
                </label>

                <label class="btn btn-outline-primary btn-custom category-button" data-filter = "asct">
                    المتقدم<input type="radio" name="options" id="option2"  autocomplete="off">المتقدم
                </label>

                <label class="btn btn-outline-primary btn-custom category-button" data-filter = "sct">
                    <input type="radio" name="options" id="option2"  autocomplete="off">الكشاف
                </label>

                <label class="btn btn-outline-primary btn-custom category-button" data-filter = "cubs">
                    <input type="radio" name="options" id="option2"  autocomplete="off">الاشبال
                </label>

                <label class="btn btn-outline-primary btn-custom category-button active" data-filter = "allu">
                    <input type="radio" name="options" id="option1"  autocomplete="off" checked> كل الوحدات
                </label>
            </div>
        </div>

        <div class="container mt-3 center" >
            <div class="row">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="card-deck">
                            @if($events->count()>0)
                                @foreach($events as $event)
                                    <div class="col-auto mb-3 mt-3 allu {{ $event->unit }}">
                                        <div class="card shadow " style="width: 18rem;">
                                            <div class="card-content">
                                                <div class="card-img">
                                                    <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/EventImages/'.$event->event_image)}}" alt="{{$event->title}}">
                                                    <span {!! $news_style !!}><h4>{{ $event->type }}</h4></span>
                                                </div>

                                                <div class="card-body" >
                                                    <div class="row">
                                                        <h6 class="text-black col-5 mt-2"><i class="fa fa-clock-o" style="color: {{ $card_color }}"></i> <small>{{$event->event_time}}</small></h6>
                                                        <h5 class="text-right text-black col-7">{{$event->title}}</h5>
                                                        <div class="clock{{ $event->event_id }}" style="width: auto;zoom: 0.35;position: absolute;left: 75px;top: 500px"></div>
                                                        <script type="text/javascript">
                                                            var clock;

                                                            $(document).ready(function() {

                                                                // Grab the current date
                                                                var currentDate = new Date();

                                                                // Set some date in the future. In this case, it's always Jan 1
                                                                var futureDate  = new Date({{substr($event->event_time, 0, 4)}}, {{substr($event->event_time, 5, 2)}}-1, {{substr($event->event_time, 8, 2)}}, {{substr($event->event_time, 11, 2)}}, {{substr($event->event_time, 14, 2)}});

                                                                // Calculate the difference in seconds between the future and current date
                                                                var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

                                                                // Instantiate a coutdown FlipClock
                                                                clock = $('.clock{{ $event->event_id }}').FlipClock(diff, {
                                                                    clockFace: 'dailyCounter',
                                                                    countdown: true,
                                                                    language:'ar-ar',

                                                                });
                                                            });
                                                        </script>
                                                    </div>

                                                    @php
                                                        $unit_name = '';
                                                        if($event->unit == "cubs"){
                                                            $unit_name = 'وحدة الاشبال';
                                                        }
                                                        if($event->unit == "sct"){
                                                            $unit_name = 'وحدة الكشاف';
                                                        }
                                                        if($event->unit == "asct"){
                                                            $unit_name = 'وحدة الكشاف المتقدم';
                                                        }
                                                        if($event->unit == "tvlr"){
                                                            $unit_name = 'وحدة الجوالة';
                                                        }
                                                        if($event->unit == "cap"){
                                                            $unit_name = 'وحدة القادة';
                                                        }
                                                    @endphp

                                                    <small class="card-subtitle text-right float-right" style="color: grey">{{$unit_name}}</small>
                                                    <a href="/events/{{$event->event_id}}" class="btn btn-outline-primary btn-custom btn-block mt-3">اقرأ اكثر</a>
                                                </div>
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
    </div>
@endsection