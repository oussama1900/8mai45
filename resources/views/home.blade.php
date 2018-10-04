<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
    <style>
        .header>div>h3{
            font-size:40px;
        }
        .header>div>h4{
            font-size:35px;
        }

        .header .title{
            text-align: center;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

        }
        .post-header>h5>span:first-child{
            padding: 5px;
            border-radius: 4px;
            color:white;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

        }
        .post-header>h5>span:nth-child(2){
            padding: 5px;
            margin-right: 5px;
            color:grey;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

        }
          .post-image{
              width: 100%;
              height: 270px;
              margin-top: 25px;
              border-radius: 4px;
          }
           .mt-3{
               margin-left: 15px;
               margin-right: 15px !important;
          }
          .post-thumbnail{
              float:right;
          }
          .post-title>h2{
              margin-top:20px;
              margin-bottom:20px;
              font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

          }
        .parallax {
            /* The image used */
            background-image: url('/images/ff.png');
            margin-top: 50px;

            /* Full height */
            height: 100%;
            width:100%;
            /* Create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover ;
        }
          .post-summary{
              margin-top:10px;
              margin-bottom:10px;
              font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

          }
          .post-summary>p{
              color: #444444;
              font-weight: 400;
              text-align: right;
              font-size: 12pt;
              margin: 0;
              margin-bottom: 15px;
              line-height: 29px;
              height: 87px;
              overflow: hidden;
          }
          .btn-light{
              background: #f2f2f2;
              border-radius: 4px;
              box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
              margin-top:10px;
              font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;

          }
          .post-content{
              text-align:right;
              display:inline-block;
              margin-top:30px;

          }
        .carousel-image{
            -webkit-filter: blur(1px);
            -moz-filter: blur(1px);
            -o-filter: blur(1px);
            -ms-filter: blur(1px);
            filter: blur(1px);
        }

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

        .slider-post-content{
            width: 100%;
        }
        .slider-post-content{
            width: 100%;
            overflow: visible;
            z-index: 9999;
            position: relative;

            padding-top:-50px

        }
        .floar-cat {
            margin-bottom: 20px;
        }
        .float-clear {
            width: 100%;
            float: right;
        }
        .slider-post-category {
            background: url('images/post-category.png');
            text-align: center;
            color: #fff;
            font-size: 12pt;
            background-size: 100% 100%;
            padding: 8px 15px;
            padding-right: 20px;
            margin-bottom: 0px;
            float: right;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        .slider-post-date {
            direction: rtl;
            color: #fff;
            font-size: 12pt;
            margin-right: 15px;
            float: right;
            margin-top: 10px;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        @media screen and (max-width: 992px){
            .slider-post-title {
                font-size: 28pt;
                line-height: 50px;
            }
        }
        .slider-post-title {
            margin: 0;
            color: #fff;
            font-weight: bold;
            text-align: right;
            font-size: 31pt;
            margin-top: 0px;
            line-height: 60px;
            direction: rtl;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
        }
        .carousel-caption{
            top:230px
        }

        @media screen and (max-width: 992px){
            .slider-post-date {
                position: relative;

                top: 0px;
                margin-top: 4px;
            }
        }

        @media screen and (max-width: 992px){
            .slider-post-category {
                font-size: 10pt;
                padding: 5px 15px;
                padding-right: 20px;
            }
        }
        .slider-post-story {
            color: #fff;
            text-align: right;
            font-weight: 600;
            font-size: 12pt;
            line-height: 35px;
            margin-top: 20px;
            font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
            direction: rtl;
        }
        .slider-post-author h3 {
            margin: 0;
            color: #cccccc;
            font-size: 10pt;
            text-align: right;
            float: right;
        }
        /* Turn off parallax scrolling for tablets and phones. Increase the pixels if needed */
        @media only screen and (max-device-width: 992px) {
            .parallax {
                background-attachment: scroll;

            }
        }
    </style>
</head>
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
@section('content')
    <!-- Masthead -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
                <li data-target="#demo" data-slide-to="5"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('images/baraa/baraa1.jpg')">



                </div>
                <div class="carousel-item " style="background-image: url('images/baraa/baraa2.ARW')">



                </div>
               <div class="carousel-item " style="background-image: url('images/baraa/baraa2.jpg')">



                </div>
               <div class="carousel-item " style="background-image: url('images/baraa/baraa3.jpg')">



                </div>
               <div class="carousel-item " style="background-image: url('images/baraa/baraa4.jpg')">



                </div>
               <div class="carousel-item " style="background-image: url('images/baraa/baraa5.jpg')">



                </div>
                <div class="carousel-item " style="background-image: url('images/baraa/baraa6.jpg')">



                </div>

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
            @include('includes.news')
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
