@extends('Layouts.new_template')
@section('content')
<head>
 <style>
  .page-footer{
      display:none;
  }
 </style>
</head>

    <!--boby background image filtred-->
    <div class="bg-filter" style="background-image:url('images/book.jpg') !important ">
    </div>
    <!------  ---------->
    <div class="wrapper" style="margin-top:20%"> 
        <div class="row">
            @foreach($books as $book)
                <div class="col-md-4 col-sm-12 " ontouchstart="this.classList.toggle('hover');">
                    <div class="container">
                        <div class="front" style="background-image: url('uploads/Books/Images/{{ $book->picture }}')">
                            <div class="inner">
                                <p>فوج الفلاح</p>
                                <span>{{ $book->title }}</span>
                            </div>
                        </div>
                        <div class="back">
                            <div class="inner">
                                <p>{!! substr(strip_tags($book->description),0,250)."..." !!}</p>
                                <!--here u can put a download btn like circle one, or u can make the whole card clicable-->

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')

@endsection
@section('styles')
    <link rel="stylesheet" href="/css/library-test.css">
@endsection
@section('og')
    <meta property="og:title" content="الموقع الرسمي لفوج الفلاح" />
    <meta property="og:image" content="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/18835730_1701449486822767_2312127021052390335_n.jpg?_nc_cat=110&_nc_ht=scontent-cdg2-1.xx&oh=cd825a0c4d827b279c38b8729d706544&oe=5C4062E0" />
    <meta property="og:description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة" />
    <meta property="og:type" content="website" />
@endsection

@section('title')
    <title> الموقع الرسمي لفوج الفلاح </title>
    <meta name="description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection