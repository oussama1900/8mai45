<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/gallery.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/ekko-lightbox.css')}}"/>
    <style>
        #description-container{
            text-align:right
        }
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

        * {
            box-sizing: border-box;
        }

        /* Position the image container (needed to position the left and right arrows) */
        .container {
            position: relative;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* Container for image text */
        .caption-container {
            text-align: center;
            background-color: #222;
            padding: 2px 16px;
            color: white;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .demo:hover {
            opacity: 1;
        }
        nav {
            background-color: #ffffff !important;
        }
    </style>
</head>
@section('content')


    <div style="height: 100px"></div>
    <!-- SECTION -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('result'))
        <div class="alert alert-success">
            <ul>
                    <li>لقد تم تسجيلك بنجاح</li>
            </ul>
        </div>
    @endif
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
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" class="facebook social-button"><i class="fa fa-facebook" style="margin-top: 20px;"></i></a>
                            <a href="https://twitter.com/intent/tweet?text={{strip_tags($currentPost->post_summary)}}&amp;url={{ URL::current() }}" class="twitter social-button"><i class="fa fa-twitter" style="margin-top: 20px;"></i></a>
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
                            <div class="mr-3" id="description-container">
                                {!! $currentPost->description !!}
                            </div>
                            <h1 class="article-title mr-3" style="text-align: right" dir="rtl">صور النشاط</h1>

                            <!-- Container for the image gallery -->
                            <div class="container" style="background-color: black;border-radius: 5px;padding-top: 5px;padding-bottom: 5px">

                                <!-- Full-width images with number text -->
                                <div class="mySlides">
                                    <div class="numbertext">1 / {{ $currentPostImages->count()+1 }}</div>
                                    <img src="{{asset('images/PostCover/'.$currentPost->cover_image)}}" style="width:100%">
                                </div>
                                @php
                                    $i = 2;
                                @endphp
                                @if($currentPostImages->count() > 0)
                                    @foreach($currentPostImages as $currentPostImage)
                                        <div class="mySlides">
                                            <div class="numbertext">{{ $i++ }} / {{ $currentPostImages->count()+1 }}</div>
                                            <img src="{{asset('images/Postimages/'.$currentPostImage->image)}}" style="width:100%">
                                        </div>
                                    @endforeach
                                @endif
                                <!-- Next and previous buttons -->
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                <!-- Image text -->
                                <div class="caption-container">
                                    <p id="caption"></p>
                                </div>

                                <!-- Thumbnail images -->
                                <div class="row ml-auto">
                                    <div class="column">
                                        <img class="demo cursor" src="{{asset('images/PostCover/'.$currentPost->cover_image)}}" style="width:100%" onclick="currentSlide(1)" alt="{{ $currentPost->post_title }}">
                                    </div>
                                    @php
                                        $i = 2;
                                    @endphp
                                    @if($currentPostImages->count() > 0)
                                        @foreach($currentPostImages as $currentPostImage)
                                            <div class="column">
                                                <img class="demo cursor" src="{{asset('images/Postimages/'.$currentPostImage->image)}}" style="width:100%" onclick="currentSlide({{ $i++ }})" alt="{{ $currentPost->post_title }}">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" class="facebook social-button"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
                            <li><a href="https://twitter.com/intent/tweet?text={{strip_tags($currentPost->post_summary)}}&amp;url={{ URL::current() }}" class="twitter social-button"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>

                        </ul>
                    </div>
                    <!-- /social widget -->

                    <!-- subscribe widget -->
                    <div class="widget subscribe-widget">
                        <div class="widget-title">
                            <h2 class="title">سجل في قائمة الاخبار</h2>
                        </div>
                        <form action="/newSubscriber" method="post">
                            {{ csrf_field() }}
                            <input class="input" type="email" placeholder="ادخل بريدك الالكتروني " name="email">
                            <button class="input-btn" type="submit">سجل</button>
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
            @if(!empty($result))
                @if(isTrue($result))
                    alert("true");
                @else
                    alert("false");
                @endif
            @endif
        });

        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }

        setInterval(function(){plusSlides(1);}, 2000);

    </script>
    <script src="{{ asset('assets/js/ekko-lightbox.js') }}"></script>
@endsection

@section('og')
    <meta property="og:title" content="{{ $currentPost->post_title }}" />
    <meta property="og:image" content="{{asset('images/PostCover/'.$currentPost->cover_image)}}" />
    <meta property="og:description" content="{{strip_tags($currentPost->description)}}" />
    <meta property="og:type" content="website" />
@endsection

@section('title')
    <title> {{ $currentPost->post_title }} </title>
    <meta name="description" content="{{ "Author: ".$currentPost->post_creator->getFullName()."Description: ".strip_tags($currentPost->description) }}">
    <meta name="author" content="{{$currentPost->post_creator->getFullName()}}">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection
