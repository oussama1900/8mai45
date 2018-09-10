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
    <style>
        .flip-clock-label {
            font-size: 40px !important;
            color: white !important;
            text-shadow: 3px 2px black !important;
        }
    </style>
</head>

<!-- events Showcases -->
<div class="container mt-3 center" >
    <div class="card shadow">
        <div class="card-header" {!! $news_style !!}>
            <h3 class="center text-center" style="color: #ffffff;">نشاطاتنا القادمة</h3>
        </div>
        <div class="row">
            <div class="col">
                <div class="row justify-content-center">
                    <div class="card-deck">
                        @if($events->count()>0)
                            @foreach($events as $event)
                                <div class="col-auto mb-3 mt-3">
                                    <div class="card shadow" style="width: 20rem;">
                                        <div class="card-content">
                                            <div class="card-img">
                                                <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/EventImages/'.$event->event_image)}}" alt="{{$event->title}}">
                                                <span {!! $news_style !!}><h4>{{ $event->type }}</h4></span>
                                            </div>

                                            <div class="card-body" >
                                                <div class="row">
                                                    <h6 class="text-black col-5 mt-2"><i class="fa fa-clock-o" style="color: {{ $card_color }}"></i> <small>{{substr($event->event_time, 0, 10)}}</small></h6>
                                                    <h5 class="text-right text-black col-7">{{$event->title}}</h5>
                                                    <div class="clock{{ $event->event_id }}" style="width: auto;zoom: 0.4;position: absolute;left: 75px;top: 500px"></div>
                                                    <script type="text/javascript">
                                                        var clock;

                                                        $(document).ready(function() {

                                                            // Grab the current date
                                                            var currentDate = new Date();

                                                            // Set some date in the future. In this case, it's always Jan 1
                                                            var futureDate  = new Date({{substr($event->event_time, 0, 4)}}, {{substr($event->event_time, 5, 2)}}, {{substr($event->event_time, 8, 2)}}, {{substr($event->event_time, 11, 2)}}, {{substr($event->event_time, 14, 2)}});

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
                                                <a href="/events/{{$event->	event_id}}" class="btn btn-outline-primary btn-custom btn-block mt-3">اقرأ اكثر</a>
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
