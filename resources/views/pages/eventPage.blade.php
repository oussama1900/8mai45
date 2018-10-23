@extends('layouts.web_template')
<head>
    <title>{{ $currentEvent->title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/event/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/event/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/event/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/event/css/main.css') }}">
    <!--===============================================================================================-->
    <style>
        .btn-outline-primary.btn-custom {
            color: #2b53ce;
            background-color: transparent;
            background-image: none;
            border-color: #2b53ce;
        }

        .btn-outline-primary.btn-custom:hover {
            color: #fff;
            background-image: linear-gradient(to bottom right, #52E5E7, #130CB7);
            border-color: #ffffff;
        }

        .btn-outline-primary.btn-custom:focus, .btn-outline-primary.btn-custom.focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
        }

        .btn-outline-primary.btn-custom.disabled, .btn-outline-primary.btn-custom:disabled {
            color: #fff;
            background-color: transparent;
        }

        .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active,
        .show > .btn-outline-primary.btn-custom.dropdown-toggle {
            color: #fff;
            background-image: linear-gradient(to bottom right, #52E5E7, #130CB7);
        }

        .btn-outline-primary.btn-custom:not(:disabled):not(.disabled):active:focus, .btn-outline-primary.btn-custom:not(:disabled):not(.disabled).active:focus,
        .show > .btn-outline-primary.btn-custom.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.1);
        }

        .card-img span {
            position:absolute;
            top: 5%;
            right: 0%;
            background: #2b53ce;
            padding: 6px;
            color: #fff;
            font-size: 12px;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;

        }
        .card-img span h4{
            font-size: 12px;
            margin:0;
            padding:10px 5px;
            line-height: 0;
        }
    </style>
</head>
@section('content')

    <div class="size1 bg0 where1-parent">
        <!-- Coutdown -->
        <div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url({{asset('images/EventImages/'.$currentEvent->event_image)}});">
            <div class="wsize2 flex-w flex-c-m cd100 js-tilt">


                <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                    <span class="l2-txt1 p-b-9 hours">17</span>
                    <span class="s2-txt4">ساعات</span>
                </div>

                <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                    <span class="l2-txt1 p-b-9 days">35</span>
                    <span class="s2-txt4">أيام</span>
                </div>


                <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                    <span class="l2-txt1 p-b-9 seconds">39</span>
                    <span class="s2-txt4">ثوان</span>
                </div>

                <div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
                    <span class="l2-txt1 p-b-9 minutes">50</span>
                    <span class="s2-txt4">دقائق</span>
                </div>
            </div>
        </div>

        <div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
                <div>
                    <div class="wrap-pic1">
                        <img src="/images/landing_page_Logo.png" style="width: 50px;height: 50px;" alt="LOGO">
                    </div>

                    <p class="m1-txt1 p-b-36">
                        <span class="m1-txt2" style="position: absolute;left: 15%;font-size: 25px;font-weight: bold">{{ $currentEvent->title }}</span>
                    </p>
                    <p class="m1-txt1 p-b-36">
                        <span class="m1-txt2 float-right" style="text-align: right" dir="rtl">  مكان الحدث : {{ $currentEvent->location }}</span>
                    </p>
                    <p class="m1-txt1 p-b-36">
                        <span class="m1-txt2 float-right" style="text-align: right" dir="rtl">  المسؤول عن الحدث : {{ $currentEvent->Event_responsible->profile->getFullName() }}</span>
                    </p>
                    <p class="m1-txt1 p-b-36">
                        <span class="m1-txt2 float-right" style="text-align: right" dir="rtl">{!!   $currentEvent->description !!}</span>
                    </p>
                </div>
            </div>


    </div>

    <script src="{{ asset('assets/event/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/event/vendor/countdowntime/moment.min.js') }}"></script>
    <script src="{{ asset('assets/event/vendor/countdowntime/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/event/vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
    <script src="{{ asset('assets/event/vendor/countdowntime/countdowntime.js') }}"></script>
    <script>
        $('.cd100').countdown100({
            /*Set Endtime here*/
            /*Endtime must be > current time*/
            endtimeYear: {{substr($currentEvent->event_time, 0, 4)}},
            endtimeMonth: {{substr($currentEvent->event_time, 5, 2)}},
            endtimeDate: {{substr($currentEvent->event_time, 8, 2)}},
            endtimeHours: {{substr($currentEvent->event_time, 11, 2)}},
            endtimeMinutes: {{substr($currentEvent->event_time, 14, 2)}},
            endtimeSeconds: 0,
            timeZone: ""
            // ex:  timeZone: "America/New_York"
            //go to " http://momentjs.com/timezone/ " to get timezone
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/event/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/event/js/main.js') }}"></script>

@endsection
@section('og')
    <meta property="og:title" content="{{ $currentEvent->title }}" />
    <meta property="og:image" content="{{asset('images/EventImages/'.$currentEvent->event_image)}}" />
    <meta property="og:description" content="{{strip_tags($currentEvent->description)}}" />
    <meta property="og:type" content="website" />
@endsection

@section('title')
    <title> {{ $currentEvent->title }} </title>
    <meta name="description" content="{{ "Author: ".$currentEvent->Event_responsible->profile->getFullName()."Description: ".strip_tags($currentEvent->description) }}">
    <meta name="author" content="{{$currentPost->post_creator->getFullName()}}">
@endsection
@section('icon')
    <link rel="icon" href="{{{ asset('/images/landing_page_Logo.png') }}}" >
@endsection