<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/gallery.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/ekko-lightbox.css')}}"/>
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
@section('content')
    <div style="height: 150px;background-image: linear-gradient(to bottom right, #52E5E7, #130CB7);">

    </div>
    <!-- SECTION -->
    <div class="section container">
        <!-- CONTAINER -->
        <div class="container">
            <!-- ROW -->
            <div class="row">
                <!-- Main Column -->
                <div class="col-md-8">

                    <!-- ARTICLE POST -->
                    <article class="article article-post">
                        <div class="article-share">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                        </div>
                        <div class="article-main-img">
                            <img src="{{asset('images/PostCover/'.$currentPost->cover_image)}}" alt="{{ $currentPost->post_title }}">
                        </div>
                        <div class="article-body">
                            <ul class="article-info" style="position: absolute;top: 20px;right: 5px;" dir="rtl">
                                <li class="article-category" style="" dir="rtl"><a style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7) !important;">{{ $currentPost->post_type }}</a></li>
                            </ul>
                            <h1 class="article-title mr-3" style="text-align: right" dir="rtl">{{ $currentPost->post_title }}</h1>
                            <ul class="article-meta mr-3" style="text-align: right">
                                <li style="text-align: right"> {{substr($currentPost->post_date, 0, 10)}} <i class="fa fa-clock-o" style="text-align: right" dir="rtl"></i></li>
                            </ul>
                            <div class="mr-3">
                                {!! $currentPost->description !!}
                            </div>

                            @if($currentPostImages->count() > 0)
                                <h1 class="article-title mr-3" style="text-align: right" dir="rtl">صور النشاط</h1>
                                <div class="container-fluid h-25">
                                    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
                                        <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                            <div class="carousel-item col-md-3  active">
                                                <div class="panel panel-default">
                                                    <div class="panel-thumbnail">
                                                        <a href="{{asset('images/PostCover/'.$currentPost->cover_image)}}" data-gallery="gallery" title="{{ $currentPost->post_title }}" data-toggle="lightbox" class="thumb">
                                                            <img class="img-fluid mx-auto d-block" src="{{asset('images/PostCover/'.$currentPost->cover_image)}}" alt="{{ $currentPost->post_title }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($currentPostImages as $currentPostImage)
                                                <div class="carousel-item col-md-3  ">
                                                    <div class="panel panel-default">
                                                        <div class="panel-thumbnail">
                                                            <a href="{{asset('images/Postimages/'.$currentPostImage->image)}}" data-gallery="gallery" title="image 2" data-toggle="lightbox" class="thumb">
                                                                <img class="img-fluid mx-auto d-block" src="{{asset('images/Postimages/'.$currentPostImage->image)}}" alt="slide 8">
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </article>
                    <!-- /ARTICLE POST -->
                </div>
                <!-- /Main Column -->

                <!-- Aside Column -->
                <div class="col-md-4">

                    <!-- social widget -->
                    <div class="widget social-widget">
                        <div class="widget-title">
                            <h2 class="title">تواصل معنا</h2>
                        </div>
                        <ul>
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
                            <li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
                            <li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
                        </ul>
                    </div>
                    <!-- /social widget -->

                    <!-- subscribe widget -->
                    <div class="widget subscribe-widget">
                        <div class="widget-title">
                            <h2 class="title">سجل في قائمة الاخبار</h2>
                        </div>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="input-btn">سجل</button>
                        </form>
                    </div>
                    <!-- /subscribe widget -->

                    <!-- article widget -->
                    <div class="widget">
                        <div class="widget-title">
                            <h2 class="title">آخر الاخبار</h2>
                        </div>
                            <!-- owl carousel 3 -->
                                <div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav">
                                    @for($i = 0; $i < 2; $i++)
                                        @php
                                            $post = $allPosts->random();
                                        @endphp
                                        <!-- ARTICLE -->
                                        <article class="article">
                                            <div class="article-img float-right" dir="rtl">
                                                <a href="/posts/{{$post->post_id}}">
                                                    <img src="{{asset('images/PostCover/'.$post->cover_image)}}" alt="{{ $post->post_title }}">
                                                </a>
                                            </div>
                                            <div class="article-body mr-3" dir="rtl">
                                                <h4 class="article-title" style="text-align: right" dir="rtl"><a href="/posts/{{$post->post_id}}">{{ $post->post_title }}</a></h4>
                                                <ul class="article-meta" style="text-align: right" dir="rtl">
                                                    <li><i class="fa fa-clock-o"></i> {{substr($post->post_date, 0, 10)}}</li>
                                                </ul>
                                            </div>

                                        </article>
                                        <!-- /ARTICLE -->
                                    @endfor
                                </div>
                            <!-- /owl carousel 3 -->
                            @for($i = 0; $i < 3; $i++)
                                @php
                                    $post = $allPosts->random();
                                @endphp
                                <!-- ARTICLE -->
                                <article class="article widget-article">
                                    <div class="article-img float-right ml-3" style="text-align: right" dir="rtl">
                                        <a href="/posts/{{$post->post_id}}">
                                            <img src="{{asset('images/PostCover/'.$post->cover_image)}}" alt="{{ $post->post_title }}">
                                        </a>
                                    </div>
                                    <div class="article-body" style="text-align: right" dir="rtl">
                                        <h4 class="article-title"><a href="/posts/{{$post->post_id}}">{{ $post->post_title }}</a></h4>
                                        <ul class="article-meta">
                                            <li><i class="fa fa-clock-o"></i> {{substr($post->post_date, 0, 10)}}</li>
                                        </ul>
                                    </div>
                                </article>
                                <!-- /ARTICLE -->
                            @endfor
                    </div>
                    <!-- /article widget -->

                    </div>
                    <!-- /article widget -->
                </div>
                <!-- /Aside Column -->
            </div>
            <!-- /ROW -->
        </div>
        <!-- /CONTAINER -->
    </div>
    <!-- /SECTION -->
    @include('includes.news')
    <script>

        $('#carouselExample').on('slide.bs.carousel', function (e) {


            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 4;
            var totalItems = $('.carousel-item').length;

            if (idx >= totalItems-(itemsPerSlide-1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i=0; i<it; i++) {
                    // append slides to end
                    if (e.direction=="left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    }
                    else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });


        $('#carouselExample').carousel({
            interval: 2000
        });


        $(document).ready(function() {
            /* show lightbox when clicking a thumbnail */
            $('a.thumb').click(function(event){
                event.preventDefault();
                var content = $('.modal-body');
                content.empty();
                var title = $(this).attr("title");
                $('.modal-title').html(title);
                content.html($(this).html());
                $(".modal-profile").modal({show:true});
            });

        });

        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
    <script src="{{ asset('assets/js/ekko-lightbox.js') }}"></script>
@endsection
