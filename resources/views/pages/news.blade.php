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
                color: #fff !important;;
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
        </style>
    </head>

    <!-- Owl Carousel 1 -->
    <div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
        @php
            $i=0;
        @endphp
        @foreach($posts as $post)
            <!-- ARTICLE -->
            <article class="article thumb-article">
                <div class="article-img">
                    <img style="background-image: url('{{asset('images/PostCover/'.$post->cover_image)}}');background-position: center;background-repeat: no-repeat;background-size:cover; height: 100%;" src="/images/cover.png" alt="{{$post->post_title}}">
                </div>
                <div class="article-body" align="right">
                    <ul class="article-info">
                        <li class="article-type" ><i class="fa fa-camera"></i></li>
                        <li class="article-category" ><a style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;" href="#">{{ $post->post_type }}</a></li>
                    </ul>
                    <h2 class="article-title"><a href="/posts/{{$post->post_id}}">{{$post->post_title}}</a></h2>
                    <ul class="article-meta">
                        <li>{{substr($post->post_date, 0, 10)}} <i class="fa fa-clock-o"></i></li>
                    </ul>
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
            <h3 class="center text-center" style="color: #ffffff;">آخر اخبارنا</h3>
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
                            @if($posts->count()>0)
                                @foreach($posts as $post)
                                    <div class="col-auto mb-3 mt-3 allu {{ $post->linked_unit }}">
                                        <div class="card shadow " style="width: 18rem;">
                                            <div class="card-content">
                                                <div class="card-img">
                                                    <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="{{asset('images/PostCover/'.$post->cover_image)}}" alt="{{$post->post_title}}">
                                                    <span {!! $news_style !!}><h4>{{ $post->post_type }}</h4></span>
                                                </div>

                                                <div class="card-body" >
                                                    <div class="row">
                                                        <h6 class="text-black col-5 mt-2"><i class="fa fa-clock-o" style="color: {{ $card_color }}"></i> <small>{{substr($post->post_date, 0, 10)}}</small></h6>
                                                        <h5 class="text-right text-black col-7">{{$post->post_title}}</h5>
                                                    </div>

                                                    @php
                                                        $unit_name = '';
                                                        if($post->linked_unit == "cubs"){
                                                            $unit_name = 'وحدة الاشبال';
                                                        }
                                                        if($post->linked_unit == "sct"){
                                                            $unit_name = 'وحدة الكشاف';
                                                        }
                                                        if($post->linked_unit == "asct"){
                                                            $unit_name = 'وحدة الكشاف المتقدم';
                                                        }
                                                        if($post->linked_unit == "tvlr"){
                                                            $unit_name = 'وحدة الجوالة';
                                                        }
                                                        if($post->linked_unit == "cap"){
                                                            $unit_name = 'وحدة القادة';
                                                        }
                                                    @endphp

                                                    <small class="card-subtitle text-right float-right" style="color: grey">{{$unit_name}}</small>
                                                    <a href="/posts/{{$post->post_id}}" class="btn btn-outline-primary btn-custom btn-block mt-3">اقرأ اكثر</a>
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