<head>
    <style>
        .navbar.solidl {
            background-color: #395eff;
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

        #nl,#dropdown04{
            color: #ffffff;
            font-weight: bold;
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
                    <a class="nav-link {{ Route::currentRouteNamed('about') ? 'btn btn-outline-light    ' : '' }}" href="/about" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">تعرف علينا</a>
                </li>
                <li class="nav-item">
                    <!-- this is the about link -->
                    <a class="nav-link {{ Route::currentRouteNamed('captains') ? 'btn btn-outline-light' : '' }}" href="/captains" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">تعرف على قادتنا</a>
                </li>
                <!-- this is the groups dropdown button -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: medium;margin-right: 8px;margin-left: 8px">الأفواج</a>
                    <div class="dropdown-menu align-items-center" aria-labelledby="dropdown04">
                        <table >
                            <tr>
                                <td>
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#" >الكشاف</a>
                                </td>
                                -                                <td>
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item align-items-center" style="text-align:center ;font-size: large" href="#">الأشبال</a>
                                </td>
                            </tr>
                            <tr >
                                <td>
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#">الجوالة</a>
                                </td>
                                <td >
                                    <img src="/images/motakadim.png" width="20" height="20" style="margin-left: 30px; position: center">
                                    <a class="dropdown-item align-items-center" style="text-align:center ;font-size: large" href="#">المتقدم</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="margin: 50%">
                                    <img src="/images/jawala.png" width="20" height="20" style="margin-left: 30px">
                                    <a class="dropdown-item" style="text-align:center ;font-size: large"  href="#">القادة</a>
                                </td>
                                <td>
                            </tr>
                        </table>
                    </div>
                </li>
                <li class="nav-item">
                    <!-- this is the news link -->
                    <a class="nav-link" href="#" style="font-size: medium;margin-right: 8px;margin-left: 8px" id="nl">الأخبار</a>
                </li>
                <li class="nav-item">
                    <!-- this is the index link -->
                    <a class="nav-link {{ Route::currentRouteNamed('home') ? 'btn btn-outline-light' : '' }}" href="/" style="font-size: medium" id="nl">الرئيسية</a>
                </li>
                <li class="nav-item" ><a class="nav-link" href="/" style="font-size: medium;margin-right: 8px;margin-left: 8px"><img src="/uploads/1528370100.png" width="35" height="35"></img></a></li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function() {
        // Transition effect for navbar
        $(window).scroll(function() {
            // checks if window is scrolled more than 500px, adds/removes solid class
            if($(this).scrollTop() > 400) {
                $('.navbar').addClass('solidl');
            } else {
                $('.navbar').removeClass('solidl');
            }
        });
    });
</script>
