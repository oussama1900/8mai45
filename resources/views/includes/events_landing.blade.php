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
<style>
    .btn-light{
        position: absolute;
        bottom:0px;
        left:10%;
        background: #f2f2f2;
        border-radius: 4px;
        box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);

        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-description-container{
        text-align: right;
    }

    .post-header>h5>span:first-child{
        padding: 5px;
        border-radius: 4px;
        color:white;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-header>h5>span:nth-child(2){
        padding: 5px;
        margin-right: 5px;
        color:grey;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-image{
        width: 100%;
        height: 270px;
        margin-top: 25px;
        border-radius: 4px;
    }
    .post-title>h2{
        margin-top:20px;
        margin-bottom:20px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-summary{
        margin-top:10px;
        margin-bottom:10px;
        font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

    }
    .post-summary>p{
        color: #444444;
        font-weight: 400;
        text-align: right;
        font-size: 12pt;
        margin: 0;
        margin-bottom: 15px;
        line-height: 29px;
        height: 87px;
        overflow: hidden;
    }
    .btn-light{
        left:0px !important;;
    }
    .post-description{
        margin-bottom: 50px;
    }
    .posts{
        text-align:right;
        display:inline-block;
        margin-top:0px;
        padding-right:0px;
        padding-top:25px;

    }
    @media (min-width: 1200px){
        .container {
            max-width: 100%;
        }
    }
    .image-title{
        font-size: 35px;
        color: white;
        text-shadow: 3px 2px black;
        position: absolute;
        top: 20%;
        left: 30px;
    }

</style>
<!-- events Showcases -->
<div class="container container-fluid">
    <div class="row" dir="rtl">


@if($events->count()>0)
    @foreach($events as $event)


<div class="col-md-10 col-lg-4">


                <div >
                    <div class="post-thumbnail">
                        <img style="filter: blur(1px);"  class="post-image" src="{{asset('images/EventImages/')}}{{"/".$event->event_image}}"  width="100%" height="100%" alt="{{$event->post_title}}">


                        @php
                            $earlier = new DateTime();
                            $later = new DateTime(substr($event->event_time, 0, 10));
                            $diff = $later->diff($earlier)->format("%a");
                        @endphp
                        @if($diff == 0)
                            <h3 class="image-title" >سيتم هاذا النشاط اليوم</h3>
                        @endif
                        @if($diff == 1)
                            <h3 class="image-title"  > سيتم هاذا النشاط غدا </h3>
                        @endif
                        @if($diff == 2)
                            <h3 class="image-title"  > سيتم هاذا النشاط بعد يومين </h3>
                        @endif
                        @if($diff > 2 && $diff <= 10)
                            <h3 class="image-title"  > سيتم هاذا النشاط بعد  {{ $diff }} ايام </h3>
                        @endif
                        @if($diff > 10)
                            <h3 class="image-title"  > سيتم هاذا النشاط بعد  {{ $diff }} يوم </h3>
                        @endif
                    </div>
                </div>
                <div class=" posts col-md-12">
                    <div class="post-description-container">
                        <div class="post-header">
                            <h5>
                                <span style="background: #7d7d8e;">
                                    {{ $event->type }}
                                </span>
                                <span dir="rtl">
                                    <i class="fa fa-clock-o"></i>
                                    {{substr($event->event_time, 0, 10)}}
                                </span>
                            </h5>
                        </div>
                        <div class="post-description">
                            <div class="post-title">
                                <h2>
                                    {{$event->title}}
                                </h2>
                            </div>
                            <div class="post-summary">
                                {!! substr($event->description,0,500) !!}...
                            </div>
                            @php
                                $unit_name = '';
                                if($event->linked_unit == "cubs"){
                                    $unit_name = 'وحدة الاشبال';
                                }
                                if($event->linked_unit == "sct"){
                                    $unit_name = 'وحدة الكشاف';
                                }
                                if($event->linked_unit == "asct"){
                                    $unit_name = 'وحدة الكشاف المتقدم';
                                }
                                if($event->linked_unit == "tvlr"){
                                    $unit_name = 'وحدة الجوالة';
                                }
                                if($event->linked_unit == "cap"){
                                    $unit_name= 'وحدة القادة';
                                }
                            @endphp
                            <small class="card-subtitle text-right float-right" style="color: grey">{{$unit_name}}</small>
                        </div>
                    </div>
                    <div class="">
                        <div class=" " style="float:left;margin-top: 15px">
                            <a href="/events/{{$event->event_id}}" target="_blank" style="text-decoration: none">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>

</div>
       @endforeach
@endif
    </div>
</div>

