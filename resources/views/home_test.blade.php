<!-- this is used to extend from the app layout -->
@extends('layouts.web_template')
<head>
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
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
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
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('{{asset('images/PostCover/slide f.jpeg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('images/PostCover/slide 2.jpeg')}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('{{asset('images/PostCover/')}}{{}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
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
    <div class="container" id="first_slide">
        <div class="slider-post-content">

            <!-- Start Slider Post Content -->

            <div class="float-clear floar-cat">

                <!-- Slider Post Category -->

                <span class="slider-post-category">

		                  	  	<a href="https://sima.youssefragab.com/category/%d8%a7%d9%83%d8%b4%d9%86/" tabindex="0">

		                  	  		اكشن
		                  	  	</a>

		                  	  </span>

                <!-- Slider Post Date -->

                <span class="slider-post-date">

			                  	<i class="fa fa-clock-o"></i>

			                  	8 سبتمبر
			                  </span>

            </div>

            <div class="float-clear">

                <!-- Slider Post Title -->

                <a href="https://sima.youssefragab.com/%d9%87%d8%b0%d8%a7-%d8%a7%d9%84%d9%86%d8%b5-%d9%87%d9%88-%d9%85%d8%ab%d8%a7%d9%84-%d9%84%d9%86%d8%b5-%d9%8a%d9%85%d9%83%d9%86-%d8%a7%d9%86-%d9%8a%d8%b3%d8%aa%d8%a8%d8%af%d9%84-%d9%81%d9%8a-%d9%86/" tabindex="0">

                    <h1 class="slider-post-title">

                        هذا النص هو مثال لنص يمكن ان يستبدل في نفس المساحة
                    </h1>

                </a>

            </div>

            <div class="float-clear">

                <!-- Slider Post Short Story -->

                <p class="slider-post-story">

                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد…

                </p>

            </div>

            <div class="float-clear">

                <div class="slider-post-info">

                    <div class="slider-post-author">

                        <img src="https://sima.youssefragab.com/wp-content/themes/Sima/images/author-ic.png" alt="author-icon">

                        <!-- Slider Post Author Name -->

                        <h3>

                            نشر بواسطة

                            <a href="https://sima.youssefragab.com/author/admin/" tabindex="0">

                                <span>يوسف رجب</span>

                            </a>

                        </h3>

                    </div>

                    <!-- Slider Post Likes -->

                    <div class="slider-post-impression">

                        <i class="fa fa-heart-o"></i>

                        4
                    </div>

                    <!-- Slider Post Comments -->

                    <div class="slider-post-impression">

                        <i class="fa fa-comments"></i>

                        1
                    </div>

                </div>

            </div>

            <!-- End Slider Post Content -->

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="" dir="rtl">

                    <div class="col-md-12">
                        <div class="post-thumbnail">
                            <img class="post-image" src="{{asset('images/PostCover/')}}{{"/".$posts[2]->cover_image}}"  width="100%" height="100%" >
                        </div>
                    </div>
                    <div class=" post-content col-md-12">
                        <div class="post-description-container">
                            <div class="post-header">
                                <h5>
               <span style="background: #7d7d8e;">
              نشاط بلدي
          </span>
                                    <span>
              <i class="fa fa-clock-o"></i>
              8 سبتمبر
          </span>
                                </h5>

                            </div>
                            <div>
                                <div class="post-title">
                                    <h2>
                                        افتتاح الموسم الكشفي 2018/2019
                                    </h2>
                                </div>
                                <div class="post-summary">
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها…</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="btn btn-light " style="">
                                <span>اقرأ المزيد</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="" dir="rtl">
                    <div class="col-md-12">
                        <div class="post-thumbnail">
                            <img class="post-image" src="{{asset('images/PostCover/')}}{{"/".$posts[2]->cover_image}}"  width="100%" height="100%" >
                        </div>
                    </div>
                    <div class=" post-content col-md-12">
                        <div class="post-description-container">
                            <div class="post-header">
                                <h5>
               <span style="background: #7d7d8e;">
              نشاط بلدي
          </span>
                                    <span>
              <i class="fa fa-clock-o"></i>
              8 سبتمبر
          </span>
                                </h5>

                            </div>
                            <div>
                                <div class="post-title">
                                    <h2>
                                        افتتاح الموسم الكشفي 2018/2019
                                    </h2>
                                </div>
                                <div class="post-summary">
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها…</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="btn btn-light " style="">
                                <span>اقرأ المزيد</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="" dir="rtl">
                    <div class="col-md-12">
                        <div class="post-thumbnail">
                            <img class="post-image" src="{{asset('images/PostCover/')}}{{"/".$posts[2]->cover_image}}"  width="100%" height="100%" >
                        </div>
                    </div>
                    <div class=" post-content col-md-12">
                        <div class="post-description-container">
                            <div class="post-header">
                                <h5>
               <span style="background: #7d7d8e;">
              نشاط بلدي
          </span>
                                    <span>
              <i class="fa fa-clock-o"></i>
              8 سبتمبر
          </span>
                                </h5>

                            </div>
                            <div>
                                <div class="post-title">
                                    <h2>
                                        افتتاح الموسم الكشفي 2018/2019
                                    </h2>
                                </div>
                                <div class="post-summary">
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها…</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="btn btn-light " style="">
                                <span>اقرأ المزيد</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
