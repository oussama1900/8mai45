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
        .content-box-blurb>*{
            text-overflow: ellipsis;
            overflow: hidden;
            font-size: 15px;
            line-height: 22px;
            white-space: nowrap;
        }
        .flip-clock-label {
            font-size: 40px !important;
            color: white !important;
            text-shadow: 3px 2px black !important;
        }

        .inner{
            padding: 1rem 1rem 1rem 1rem;
        }
        .content-box-thumb {
            display: block;
            max-width: 100%;
            height: auto;
        }
        .card{
            padding:0px;
            margin-right:-1rem;
            padding-left: -1rem;
        }
    </style>
</head>

<!-- events Showcases -->

@if($events->count()>=3)
    @for($event=0;$event<3;$event++)
<div class="col-md-4">
    <div class="" dir="rtl">

        <div class=" card col-md-12">

            <div class="inner">
                <img class="content-box-thumb" src="{{asset('images/EventImages/'.$events[$event]->event_image)}}" alt="tech image">

                <div class="clock{{$events[$event]->event_id}}" style="width: auto;zoom: 0.35;position: absolute;left: 25%;top: 55%"></div>
                <script type="text/javascript">
                    var clock;

                    $(document).ready(function() {

                        // Grab the current date
                        var currentDate = new Date();
                        console.log(futureDate);
                        // Set some date in the future. In this case, it's always Jan 1
                        var futureDate  = new Date( {{substr($events[$event]->event_time, 0, 4)}}, {{substr($events[$event]->event_time, 5, 2)}}, {{substr($events[$event]->event_time, 8, 2)}}, {{substr($events[$event]->event_time, 11, 2)}}, {{substr($events[$event]->event_time, 14, 2)}});

                        // Calculate the difference in seconds between the future and current date
                        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

                        var clock = $('.clock{{$events[$event]->event_id}}').FlipClock(futureDate, {
                            clockFace: 'DailyCounter',
                            countdown: true,
                            language:'ar-ar',
                            autoStart: true
                        });
                    });
                </script>
                <h1 class="content-box-header ng-binding">
                    {{$events[$event]->title}}
                </h1>
                <div class="content-box-blurb ng-binding"  >
                    {!! $events[$event]->description !!}
                </div>

                @php
                    $unit_name = '';
                    if($events[$event]->unit == "cubs"){
                        $unit_name = 'وحدة الاشبال';
                    }
                    if($events[$event]->unit == "sct"){
                        $unit_name = 'وحدة الكشاف';
                    }
                    if($events[$event]->unit == "asct"){
                        $unit_name = 'وحدة الكشاف المتقدم';
                    }
                    if($events[$event]->unit == "tvlr"){
                        $unit_name = 'وحدة الجوالة';
                    }
                    if($events[$event]->unit == "cap"){
                        $unit_name = 'وحدة القادة';
                    }
                @endphp
                <div style="text-align: right !important;">
                    <small  >{{$unit_name}}</small>
                </div>

                <a class="readmore-link" href="/events/{{$events[$event]->event_id}}" style="text-decoration: none">اقرأ أكثر</a>
            </div>
        </div>
    </div>
</div>
@endfor
    @endif

<!--<div class="container mt-3 center" >
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
                                                    <div class="clock" ></div>
                                                    <script type="text/javascript">
                                                        var clock;

                                                        $(document).ready(function() {

                                                            // Grab the current date
                                                            var currentDate = new Date();
                                                            console.log(futureDate);
                                                            // Set some date in the future. In this case, it's always Jan 1
                                                          //  var futureDate  = new Date( {{substr($event->event_time, 0, 4)}}, {{substr($event->event_time, 5, 2)}}-1, {{substr($event->event_time, 8, 2)}}, {{substr($event->event_time, 11, 2)}}, {{substr($event->event_time, 14, 2)}});

                                                            // Calculate the difference in seconds between the future and current date
                                                            var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
                                                            var eventDate = new Date('2018-08-25 00:00:00');
                                                            var clock = $('.clock').FlipClock(eventDate, {
                                                                clockFace: 'DailyCounter',
                                                                countdown: true,
                                                                autoStart: true
                                                            });
                                                        });
                                                    </script>
                                                </div>


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
</div>-->
