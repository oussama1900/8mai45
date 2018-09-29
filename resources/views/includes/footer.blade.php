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
<footer class="footer bg-light p-3">
    <div class="container">
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
    </div>
</footer>