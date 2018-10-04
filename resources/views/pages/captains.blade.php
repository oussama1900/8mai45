@extends('layouts.web_template')

<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    @php
        $card_color = '#2b53ce';
        $news_style = 'style="background-image: linear-gradient(to bottom right, #52E5E7, #130CB7); radius: 5px;"';
        $number = 0;
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
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/capStyle.css')}}"/>
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
                color: #fff !important;
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

            .flip-clock-label {
                font-size: 40px !important;
                color: white !important;
                text-shadow: 3px 2px black !important;
            }
        </style>
    </head>
                <div style="height: 100px;">

    </div>

    <section class="container mt-3">
        <div class="row active-with-click">
            @foreach($captains as $captain)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Light-Blue">
                        <h2>
                            <span style="text-align: right">{{ $captain->profile->getFullName() }}</span>
                            <strong style="text-align: right">
                                {{ $captain->assignedRole->getRole() }}
                                <i class="fa fa-fw fa-star"></i>
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-fluid" style="width:100% !important" src="{{ $captain->profile->getPicture() }}">
                            </div>
                            @php
                                $birth_date = "تاريخ الميلاد";
                                $membership_date = "تاريخ الانضمام";
                                $email = "البريد الالكتروني";
                                $phone = "رقم الهاتف";
                            @endphp
                            <div class="mc-description" style="text-align: right">
                                {{ $captain->profile->date_of_birth }} : {{ $birth_date }}
                                <br>
                                {{ $captain->profile->membership_date }} : {{ $membership_date }}
                                <br>
                                {{ $captain->profile->email }} : {{ $email }}
                                <br>
                                {{ $captain->profile->phone }} : {{ $phone }}
                            </div>
                        </div>
                        <a class="mc-btn-action" style="color: #fff;">
                            <i class="fa fa-bars" style="color:white"></i>
                        </a>
                        <div class="mc-footer">
                            <h4 class="pull-right"  dir="rtl" style="text-align: right;position: absolute;right: 50%">
                                تواصل
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </section>
@endsection
