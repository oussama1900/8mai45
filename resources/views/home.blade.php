<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')

<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
    <div class="container-fluid main">
@section('content')
    <!-- Masthead -->

<!--carousel-->
      <div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000" style="absolute:absolute;height:550px">
          <div class="carousel-inner" role="listbox">
              <!-- background image should be 890x(500-600)-->
              <div class="item active background a" style="background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0)), url('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/35406393_2001873566795487_2274415969004683264_n.jpg?_nc_cat=0&_nc_eui2=AeEC2IH6mFWf6T68R0S32E6eTXhVc9yJ_pbQ0PSGHlQ0CkWM-0Zw1CstcAZbBt3a5CR06qWjRjOtxHW38doNp8VPX-M8zIWtm14fEx1ULPtz7w&oh=ce5090861033105f676f8da1cf9e6582&oe=5BB397C4');">
                  <div class="covertext">
                      <div class="col-lg-10" style="float:none; margin:0 auto;">
                          <h1 class="title">اللقاء التغافري</h1>
                          <h3 class="subtitle">عيد الفطر</h3>
                      </div>
                      <div class="col-xs-12 explore">
                          <a href="#"><button type="button" class="btn btn-lg explorebtn">اقرا اكثر</button></a>
                      </div>
                  </div>
              </div>
              <div class="item background b"></div>
                        <div class="item background c"></div>
          </div>
      </div>







    <!-- events Showcases -->
    <div class="container mt-3 center" style="top:600px">
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
                                            <h4 class="card-title text-right">{{$event->title}}</h4>
                                            <h6 class="card-subtitle text-muted text-right">{{$event->location}}</h6>
                                        </div>
                                        <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/EventImages/'.$event->event_image)}}" alt="{{$event->title}}">
                                        <div class="card-body">
                                            <p class="card-text">{!!  $event->description !!}</p>
                                            <a href="#" align="right" class="card-link pink btn btn-outline-primary float-right m-3 text-right">اقرأ اكثر</a>
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
      </div>
