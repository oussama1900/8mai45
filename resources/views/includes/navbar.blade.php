<head>
    <style>
        .navbar.solidl {
            background-color: #6E20A0;
            transition: background-color 1s ease 0s;
            box-shadow: 0 0 4px grey;
        }

        .navbar.solidl .navbar-brand {
            color: #ffffff;
            transition: color 1s ease 0s;
        }
        .navbar.solidl .navbar-nav > li > a {
            color: #ffffff;
            font-weight: bold;
            transition: color 1s ease 0s;
        }

        .navbar.solidc .navbar-brand {
            color: #ffffff;
            transition: color 1s ease 0s;
        }
        .navbar.solidc .navbar-nav > li > a {
            color: #ffffff;
            font-weight: bold;
            transition: color 1s ease 0s;
        }
        .navbar.solidc {
            background-color: #105528;
            transition: background-color 1s ease 0s;
            box-shadow: 0 0 4px grey;
        }

        #nl,#dropdown04{
            color: white;
            font-weight: bold;
        }

        .activenav{
            border: 1px solid #ffffff;
            border-radius: 5px;
        }

        .nav-link.lp:hover,.dropdown-item.lp:hover{
            background-color: #6E20A0;
            color: #FFFFFF;
            border-radius: 5px;
            border: 1px solid #ffffff;
            border-radius: 5px;
        }

        .nav-link.cp:hover,.dropdown-item.cp:hover{
            background-color: #105528;
            color: #FFFFFF;
            border-radius: 5px;
            border: 1px solid #ffffff;
            border-radius: 5px;
        }

        .dropdown-menu.lp{
            background-color:#6E20A0;
            border: 1px solid #ffffff;
            border-radius: 5px;
        }

        .dropdown-menu.cp{
            background-color:#105528;
            border: 1px solid #ffffff;
            border-radius: 5px;
        }
    </style>
</head>

<nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top" style="margin-bottom: 0px" >
    <div   style="width: 100%" >
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto"  >
                <li class="nav-item">
                    <!-- this is the about link -->
                    <a class="nav-link {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} {{ Route::currentRouteNamed('about') ? 'activenav' : '' }}" href="/about" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">تعرف علينا</a>
                </li>
                <li class="nav-item">
                    <!-- this is the about link -->
                    <a class="nav-link {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} {{ Route::currentRouteNamed('captains') ? 'activenav' : '' }}" href="/captains" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">تعرف على قادتنا</a>
                </li>
                <!-- this is the groups dropdown button -->
                <li class="nav-item dropdown">
                    <a class="nav-link {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} {{ Route::currentRouteNamed('cubs') ? 'activenav' : '' }} dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: medium;margin-right: 8px;margin-left: 8px">الأفواج</a>
                    <div class="dropdown-menu {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} align-items-baseline dropdown-menu-right" aria-labelledby="dropdown04">

                                    <a class="dropdown-item {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} {{ Route::currentRouteNamed('cubs') ? 'activenav' : '' }}" style="text-align:center ;font-size: large;color: #ffffff;"  href="/cubs" >الكشاف</a>

                                    <a class="dropdown-item {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} align-items-center" style="text-align:center ;font-size: large ; color: #ffffff;" href="#">الأشبال</a>

                                    <a class="dropdown-item {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }}" style="text-align:center ;font-size: large; color: #ffffff;"  href="#">الجوالة</a>

                                    <a class="dropdown-item {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} align-items-center" style="text-align:center ;font-size: large; color: #ffffff;" href="#">المتقدم</a>

                                    <a class="dropdown-item {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }}" style="text-align:center ;font-size: large; color: #ffffff;"  href="#">القادة</a>

                    </div>
                </li>
                <li class="nav-item">
                    <!-- this is the news link -->
                    <a class="nav-link {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} {{ Route::currentRouteNamed('news') ? 'activenav' : '' }}" href="#" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">الأخبار</a>
                </li>
                <li class="nav-item">
                    <!-- this is the index link -->
                    <a class="nav-link {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }} {{ Route::currentRouteNamed('home') ? 'activenav' : '' }}" href="/" style="font-size: medium" id="nl">الرئيسية</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link {{ Route::currentRouteNamed('cubs') ? 'cp' : 'lp' }}" href="/" style="font-size: medium;margin-right: 8px;margin-left: 8px;margin-top:-10px">
                        <img src="{{ Route::currentRouteNamed('cubs') ? '/images/cubslogo.jpg' : '/images/logonav.png' }}" width="50" height="50" >
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function() {
        // Transition effect for navbar
        $(window).scroll(function() {
            // checks if window is scrolled more than 500px, adds/removes solid class
            if($(this).scrollTop() > 80) {
                $('.navbar').addClass('{{ Route::currentRouteNamed('cubs') ? 'solidc' : 'solidl' }}');
            } else {
                $('.navbar').removeClass('{{ Route::currentRouteNamed('cubs') ? 'solidc' : 'solidl' }}');
            }
        });
    });
</script>
