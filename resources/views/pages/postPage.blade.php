@extends('layouts.new_template')
@section('content')
    <section class="sec1"></section>
    <div class="shape">
        <div class="bottom"></div>
        <div class="top"></div>

    </div>
    <div class="shape1">
        <div class="bottom">
            <div class="page-title">
                <h1>الأخبار</h1>
            </div>
        </div>
        <div class="top"></div>

    </div>
    </section>
    <!---->
    <section class="sec2">
        <div class="row col">
            <div class="col-md-2 news-cards-container">
                <div class="row">
                    <div class="card" style="width: 100%; margin-bottom:5%;">
                        <div class="card-header">
                            متفرقات
                        </div>
                        <ul class="list-group list-group-flush" id="elem">
                            @foreach($sidePosts as $post)
                                <li class="list-group-item" id="elem1"><a href="/posts/{{$post->post_id}}" style="color: black !important;">{{$post->post_title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class=" row">
                    <div class="card" style="width: 100%; margin-bottom:5%;">
                        <div class="card-header">
                            سجل في قائمة الأخبار
                        </div>
                        <form action="/newSubscriber" method="post">
                            <ul class="list-group list-group-flush">
                                <div class="row" style="max-width: 90%; margin: 5% 0% 0% 5%">
                                    <input type="email" placeholder="ادخل بريدك الالكتروني " name="email" class="form-control" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <div class="row" style="max-width: 90%; margin: 5% 0% 5% 5%">
                                    <input type="submit" class="btn btn-cust">سجل</input>
                                </div>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class=" row">
                    <div class="card" style="width: 100%; margin-bottom:5%;">
                        <div class="card-header">
                            تواصل معنا
                        </div>
                        <ul class="list-group list-group-flush">
                            <!--Facebook-->
                            <a href="https://www.facebook.com/faleh.19/" target="_blank" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i> Facebook</a>
                            <!--Twitter-->
                            <a href="https://twitter.com/groupe_faleh_19" target="_blank" class="btn btn-tw"><i class="fab fa-twitter pr-1"></i> Twitter</a>
                            <!--Instagram-->
                            <a href="https://www.instagram.com/groupfaleh/" target="_blank" class="btn btn-ins"><i class="fab fa-instagram pr-1"></i> Instagram</a>
                            <!--Youtube-->
                            <a href="https://www.youtube.com/channel/UCvJ4gk_JufwvI9_VneFF2ZQ" target="_blank" class="btn btn-yt"><i class="fab fa-youtube pr-1"></i> Youtube</a>
                            <!--Email-->
                            <a href="/contact" target="_blank" class="btn btn-email"><i class="fas fa-envelope pr-1"></i> Email</a>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md defer-news-container ">
                <div class="row" style="margin-bottom:10%;">
                    <div class="card text-center">
                        <div class="card-body" style="padding:0;">
                            <img src="{{asset('images/PostCover/'.$currentPost->cover_image)}}" alt="{{ $currentPost->post_title }}" style="max-height:700px; border: 0;">

                        </div>
                        <div class="card-header" style="text-align: right">
                            <h3>{{ $currentPost->post_title }}</h3>
                            <h5>{{substr($currentPost->post_date, 0, 10)}}</h5>
                            @php
                                $unit_name = '';
                                if($currentPost->linked_unit == "cubs"){
                                    $unit_name = 'وحدة الاشبال';
                                }
                                if($currentPost->linked_unit == "sct"){
                                    $unit_name = 'وحدة الكشاف';
                                }
                                if($currentPost->linked_unit == "asct"){
                                    $unit_name = 'وحدة الكشاف المتقدم';
                                }
                                if($currentPost->linked_unit == "tvlr"){
                                    $unit_name = 'وحدة الجوالة';
                                }
                                if($currentPost->linked_unit == "cap"){
                                    $unit_name= 'وحدة القادة';
                                }
                            @endphp
                            <h6>{{ $unit_name }}</h6>
                        </div>
                        <div class="card-footer text-muted">
                            <p>{!! $currentPost->description !!}</p>
                        </div>



                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection
@section('scripts')

@endsection
@section('styles')
    <link rel="stylesheet" href="/css/newsBig.css">
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
