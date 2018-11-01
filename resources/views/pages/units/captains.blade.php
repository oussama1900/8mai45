<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
<head>
    <style>
        .carousel-item{
            opacity: 0.85;
        }
    </style>

</head>
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
                @if(count($posts)==0)
                    <div class="carousel-item active" style="background-image: url('https://via.placeholder.com/1200x720?text=post+1')">
                    </div>
                    <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1200x720?text=post+2')">
                    </div>
                    <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1200x720?text=post+3')">
                    </div>
                @endif
            <!-- Slide One - Set the background image for this slide in the line below -->
                @if(count($posts)>0)
                    <div class="carousel-item active" style="background-image: url('{{asset('images/PostCover/')}}{{'/'.$posts[0]->cover_image}}')">
                    </div>
                @endif
            <!-- Slide Two - Set the background image for this slide in the line below -->
                @if(count($posts)>1)
                    <div class="carousel-item" style="background-image: url('{{asset('images/PostCover/')}}{{'/'.$posts[1]->cover_image}}')">
                    </div>
                @endif
            <!-- Slide Three - Set the background image for this slide in the line below -->
                @if(count($posts)>2)
                    <div class="carousel-item" style="background-image: url('{{asset('images/PostCover/')}}{{'/'.$posts[2]->cover_image}}')">
                    </div>
                @endif
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
            <h3 class="title" style="text-align: center">آخر أخبار وحدة القادة </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">شعارنا للعمل
            </h4>
        </div>

    </div>
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
@section('og')
    <meta property="og:title" content="فوج الفلاح وحدة القادة" />
    <meta property="og:image" content="{{ asset('/images/landing_page_Logo.png') }}" />
    <meta property="og:description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة" />
    <meta property="og:type" content="website" />
@endsection

@section('title')
    <title>فوج الفلاح وحدة القادة</title>
    <meta name="description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection