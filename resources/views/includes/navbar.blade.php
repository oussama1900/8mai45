@php

        $nav_color = 'lp';
        $nav_logo = '/images/landing_page_Logo.png';
        $solid_color = 'solidl';
        $activenavu = '';
        $activenavc = '';
        $activenavs = '';
        $activenavas = '';
        $activenavt = '';

    if (Route::currentRouteNamed('cubs')){
        $nav_color = 'cp';
        $nav_logo = '/images/cubs_logo.jpg';
        $solid_color = 'solidc';
        $activenavu = 'activenav';
        $activenavc = 'activenav';
    }
    if (Route::currentRouteNamed('scout')){
        $nav_color = 'sp';
        $nav_logo = '/images/scout_logo.jpg';
        $solid_color = 'solids';
        $activenavu = 'activenav';
        $activenavs = 'activenav';
    }

    if (Route::currentRouteNamed('advanced_scout')){
        $nav_color = 'asp';
        $nav_logo = '/images/advanced_scout_logo.jpg';
        $solid_color = 'solidas';
        $activenavu = 'activenav';
        $activenavas = 'activenav';
    }

    if (Route::currentRouteNamed('traveler')){
        $nav_color = 'tp';
        $nav_logo = '/images/traveler_logo.png';
        $solid_color = 'solidt';
        $activenavu = 'activenav';
        $activenavt = 'activenav';
    }
@endphp

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
                    <a class="nav-link {{ $nav_color }} {{ Route::currentRouteNamed('about') ? 'activenav' : '' }}" href="/about" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">تعرف علينا</a>
                </li>
                <li class="nav-item">
                    <!-- this is the about link -->
                    <a class="nav-link {{ $nav_color }} {{ Route::currentRouteNamed('captains') ? 'activenav' : '' }}" href="/captains" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">تعرف على قادتنا</a>
                </li>
                <!-- this is the groups dropdown button -->
                <li class="nav-item dropdown" style="position:static" id="dropdownbutton">
                    <a class="nav-link {{ $nav_color  }} {{ $activenavu }} dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: medium;margin-right: 8px;margin-left: 8px; ">الوحدات</a>
                    <ul class="dropdown-menu {{ $nav_color }}  " role="menu" aria-labelledby="dropdown04" style="width:100%;margin-top:0px">


                         <li class="dropdown-menu-item">   <a  class="dropdown-item {{ $nav_color }} {{ $activenavc }}" style="text-align: center;font-size: large;color: #ffffff;"  href="/cubs" >الأشبال</a></li>

                         <li class="dropdown-menu-item">   <a class="dropdown-item {{ $nav_color }} {{ $activenavs }} " style="text-align: center;font-size: large ; color: #ffffff;" href="/scout">الكشاف</a></li>

                         <li class="dropdown-menu-item">  <a  class="dropdown-item {{ $nav_color }} {{ $activenavas }}" style="text-align: center;font-size: large; color: #ffffff;"  href="/advanced_scout">المتقدم</a></li>

                         <li class="dropdown-menu-item">   <a class="dropdown-item {{ $nav_color }} {{ $activenavt }} " style=" text-align: center;font-size: large; color: #ffffff;" href="/traveler">الجوالة</a></li>

                         <li class="dropdown-menu-item">   <a class="dropdown-item  {{ $nav_color }} {{ $activenavt }}" style=" text-align: center;font-size: large; color: #ffffff;"  href="/Captains">القادة</a></li>

                     </ul>

                </li>
                <li class="nav-item">
                    <!-- this is the news link -->
                    <a class="nav-link {{ $nav_color }} {{ Route::currentRouteNamed('news') ? 'activenav' : '' }} {{ Route::currentRouteNamed('readPost') ? 'activenav' : '' }}" href="/news" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">الأخبار</a>
                </li>
                <li class="nav-item">
                    <!-- this is the index link -->
                    <a class="nav-link {{ $nav_color }} {{ Route::currentRouteNamed('home') ? 'activenav' : '' }}" href="/" style="font-size: medium" id="nl">الرئيسية</a>
                </li>
                <li class="nav-item" >
                    <a class="nav-link {{ $nav_color }}" href="/" style="font-size: medium;margin-right: 8px;margin-left: 8px;margin-top:-10px">
                        <img src="{{ $nav_logo }}" width="50" height="50" >
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
                $('.navbar').addClass('{{ $solid_color }}');
            } else {
                $('.navbar').removeClass('{{ $solid_color }}');
            }
        });
    });
</script>
<style>
    li.nav-item.dropdown.open{
        position:static
    }
    li.nav-item.dropdown.open .dropdown-menu{
        display:table;
        width: 100%;
        text-align: center;
        left:0;
        right:0;
    }

    @media only screen  and (min-width: 450px){

        li.dropdown-menu-item{
            display: table-cell;
            width:5%
        }

    }

</style>