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

                        <div class="clock{{$events[$event]->event_id}}" style="width: auto;zoom: 0.35;position: absolute;left: 25%;top: 50%"></div>
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