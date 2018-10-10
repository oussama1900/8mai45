<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <link rel="stylesheet" href="/css/landing.css">
</head>
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    <!-- Masthead -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ul class="carousel-indicators">
                @foreach($carousels as $carousel)
                    @if($loop->index == 0)
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                    @else
                        <li data-target="#demo" data-slide-to="{{ $loop->index }}"></li>
                    @endif
                @endforeach
            </ul>
            <div class="carousel-inner">
                @foreach($carousels as $carousel)
                    @if($loop->index == 0)
                        <div class="carousel-item active" style="background-image: url('{{ asset('/images/Carousel').'/'.$carousel->image }}')"></div>
                    @else
                        <div class="carousel-item" style="background-image: url('{{ asset('/images/Carousel').'/'.$carousel->image }}')"></div>
                    @endif
                @endforeach
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
    <div class="row header" style="text-align: center;margin-top:20px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">آخر أخبارنا </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">آخر أخبارنا وآخر النشاطات في فوجنا العريق </h4>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey"> فوج الفلاح </h4>
        </div>
    </div>

    <!--start posts -->
    <div class=" mt-3 ">

        <div class="row">
            @include('includes.news_test')
        </div>




    </div>



    <div class="row header" style="text-align: center;margin-top:40px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">محطاتنا القادمة </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">محطاتنا القادمة وانشطتنا المرتقبة</h4>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey"> قريبا </h4>
        </div>
    </div>
    <div class=" mt-3 ">
        <div class="row">
            @include('includes.events')
        </div>
    </div>

@endsection
