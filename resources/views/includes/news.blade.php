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

<!-- events Showcases -->
<div class="container mt-3 center" >
    <div class="card shadow">
        <div class="card-header" {!! $news_style !!}>
            <h3 class="center text-center" style="color: #ffffff;">آخر اخبارنا</h3>
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

                                                <h6 class="card-subtitle text-right" style="color: grey">{{$unit_name}}</h6>
                                                <a href="#" class="btn btn-outline-primary btn-custom btn-block mt-3">اقرأ اكثر</a>
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
        <div class="center" style="width: 10%; margin: 10px auto;"  >{{$events->links("pagination::bootstrap-4")}}</div>
    </div>
</div>