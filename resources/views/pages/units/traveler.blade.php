@extends('layouts.new_template')
@section('content')

    <section class="sec1">
        <div class="shape">
            <div class="bottom"></div>
            <div class="top"></div>

        </div>
        <div class="shape1">
            <div class="bottom">
                <div class="page-title">
                    <h1>آخر أخبار وحدة الجوالة</h1>
                    <h2>شعارنا العمل</h2>
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
                            @foreach($sideposts as $post)
                                <li class="list-group-item" id="elem1" >
                                    <a href="/posts/{{$post->post_id}}" style="color: black !important;">{{$post->post_title}}</a>
                                </li>
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
            <div class="col-md defer-news-container">
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col">
                            <section class="card  card-section">
                                <div class=" one" style="background: -webkit-linear-gradient(15deg, #ffffff 68%, #902723, #902723 69%, transparent, transparent 85%),url(''); z-index:1">
                                    <div class="row">
                                        <h3>{{ $post->post_type }}</h3>
                                        <h1>{{$post->post_title}}</h1>
                                        <h2>{{substr($post->post_date, 0, 10)}}</h2>
                                        {!! $post->post_summary !!}
                                        <div class="row col">
                                            <a class="btn btn-primary read-more button" href="/posts/{{$post->post_id}}">إقرأ المزيد</a>
                                        </div>
                                    </div>
                                </div>
                                 <div style="position:absolute;right:0; width:50%;height:100% !important;padding:0 !important;margin:0 !important;
                                 background: url('{{asset('images/PostCover/')}}{{"/".$post->cover_image}}') no-repeat center center;
                                 -webkit-background-size: cover;
                                 -moz-background-size: cover;
                                 -o-background-size: cover;
                                 background-size: cover;
                                 z-index:0 ">
                                </div>
                            </section>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        <div class="" style="margin-left: auto;margin-right: auto;width: 6em">
            {{$posts->links('pagination::bootstrap-4')}}
        </div>
    </section>
@endsection
@section('scripts')

@endsection
@section('styles')
    <link rel="stylesheet" href="/css/traveler.css">
    <style>
        .page-link{
            color: #000 !important;
        }
    </style>
@endsection
@section('og')
    <meta property="og:title" content="الموقع الرسمي لفوج الفلاح" />
    <meta property="og:image" content="{{ asset('/images/cubs-logo.png') }}" />
    <meta property="og:description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة" />
    <meta property="og:type" content="website" />
@endsection
@section('title')
    <title> الموقع الرسمي لفوج الفلاح </title>
    <meta name="description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة">
@endsection
@section('icon')
    <link rel="icon" href="{{ asset('/images/traveler-logo.png') }}" >
@endsection
