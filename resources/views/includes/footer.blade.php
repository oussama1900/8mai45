<!-- Footer -->
<head>
    <style>
        .colorl {
            color: #2b53ce;
        }
        .colorl:hover , .colorl:focus{
            color: #1d3490;
        }

        .colorc {
            color: #ffd700;
        }
        .colorc:hover , .colorc:focus{
            color: #a88700;
        }

        .colors {
            color: #00cc00;
        }
        .colors:hover , .colors:focus{
            color: #008d00;
        }

        .coloras {
            color: #701700;
        }
        .coloras:hover , .coloras:focus{
            color: #cb2d00;
        }

        .colort {
            color: #ee2c2c;
        }
        .colort:hover , .colort:focus{
            color: #871919;
        }
        .footer{
            background-color: #2e2e2e !important;
            margin-top:30px;
        }
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
        label{
            color:#ffffff;
        }
        hr{
            background-color: #ffffff;
        }
        li>a{
            color:white !important;
        }
        .soc-item>a>span{
            color:white !important;
        }
    </style>
</head>
@php
    $color = 'colorl';
    if (Route::currentRouteNamed('cubs')){
        $color = 'colorc';
    }
    if (Route::currentRouteNamed('scout')){
        $color = 'colors';
    }

    if (Route::currentRouteNamed('advanced_scout')){
        $color = 'coloras';
    }

    if (Route::currentRouteNamed('traveler')){
        $color = 'colort';
    }
@endphp
<footer class="footer  p-3">
    <section >





        <div class="container">
            <div class="media-container-row content mbr-white" style="display:flex">
                <div class="col-12 col-md-6">
                    <div style="width:100%;height:400px">
                        <div><div><iframe style="float:left" width="500" height="400" id="" src="https://maps.google.com/maps?q=Cite%20Yahiaoui&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
                    </div>                </div>
                <div class="col-12 col-md-6 mbr-fonts-style display-7" style="margin-left:45px">
                    <div class="column">
                        <form action="#">
                            <label class="float-right" for="fname" style="text-align:right">اللقب</label>
                            <input type="text" style="text-align:right" id="fname" name="firstname" placeholder="لقبك">
                            <label class="float-right" for="lname" style="text-align:right">الاسم</label>
                            <input type="text" style="text-align:right" id="lname" name="lastname" placeholder="اسمك">
                            <label class="float-right" for="subject" style="text-align:right">الموضوع</label>
                            <textarea id="subject" style="text-align:right" name="subject" placeholder="اكتب هنا ..." style="height:170px"></textarea>
                            <input class="float-right" type="submit" value="ارسل">
                        </form>
                    </div>
                </div>


            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="row mbr-white">
                    <div class="col-sm-6 copyright">
                        <div class="mbr-text mbr-fonts-style display-7">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item">
                                <a class="{{ $color }}" href="/about">About</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a class="{{ $color }}" href="/contact">Contact</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a class="{{ $color }}" href="#">Terms of Use</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a class="{{ $color }}" href="#">Privacy Policy</a>
                            </li>
                        </ul>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social-list align-right">
                            <ul class="list-inline mb-2" style="float:right">
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/groupe_faleh_19" target="_blank">
                                        <i class=" fa fa-twitter fa-2x fa-fw"></i>                                    </a>
                                </li>
                                <li class="list-inline-item">&sdot;</li>
                                <li class="list-inline-item">
                                    <a href="https://www.facebook.com/faleh.19" target="_blank">
                                        <i class=" fa fa-facebook fa-2x fa-fw"></i>                                    </a>
                                </li>
                                <li class="list-inline-item">&sdot;</li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank">
                                        <i class=" fa fa-youtube fa-2x fa-fw"></i>                                    </a>
                                </li>
                                <li class="list-inline-item">&sdot;</li>
                                <li class="list-inline-item">
                                    <a href="https://www.instagram.com/groupefaleh/" target="_blank">
                                        <i class=" fa fa-instagram fa-2x fa-fw"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" target="_blank">
                                        <i class=" fa fa-google-plus fa-2x fa-fw"></i>
                                    </a>
                                </li>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
   <!-- <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a class="{{ $color }}" href="/about">About</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a class="{{ $color }}" href="/contact">Contact</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a class="{{ $color }}" href="#">Terms of Use</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a class="{{ $color }}" href="#">Privacy Policy</a>
                    </li>
                </ul>
                <p class="{{ $color }} text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6  text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="https://www.facebook.com/faleh.19" target="_blank">
                            <i class="{{ $color }} fa fa-facebook fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="https://twitter.com/groupe_faleh_19" target="_blank" >
                            <i class="{{ $color }} fa fa-twitter fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/groupefaleh/" target="_blank" >
                            <i class="{{ $color }} fa fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>-->
</footer>