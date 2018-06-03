<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- below style is intended to center the logo -->
    <style type="text/css">
    .navbar-brand {
      position: absolute;
      width: auto;
      left: 0;
      top: 0;
      text-align: center;
      margin-left: 48%;
      margin-right: 50%;
    }
    .nav-link {
      text-align: center;
    }
  </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <!-- Navbar Brand, should be changed by the logo later-->
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>

            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      @guest
                        <button type="button" id="login-drop-down" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" href="{{ route('login') }}">{{ __('ساحة الكشاف') }} <span class="carret"></span></button>
                          <ul class="dropdown-menu dropdown-menu-left mt-2 bg-secondary">
                             <li class="px-3 py-2">
                               <!-- this is the login form -->
                               <div class="card">
                               <div class="card-body">
                                   <form method="POST" action="{{ route('login') }}">
                                       @csrf

                                       <div class="form-group row">
                                           <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('البـــريد الالكتروني') }}</label>

                                           <div class="col-md-6">
                                               <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                               @if ($errors->has('email'))
                                                   <span class="invalid-feedback">
                                                       <strong>{{ $errors->first('email') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلــمة السر') }}</label>

                                           <div class="col-md-6">
                                               <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                               @if ($errors->has('password'))
                                                   <span class="invalid-feedback">
                                                       <strong>{{ $errors->first('password') }}</strong>
                                                   </span>
                                               @endif
                                           </div>
                                       </div>

                                       <div class="form-group row">
                                           <div class="col-md-6 offset-md-4">
                                               <div class="checkbox">
                                                   <label>
                                                       <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('تذكرني على هذا الجهاز') }}
                                                   </label>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="form-group row mb-0">
                                           <div class="col-md-8 offset-md-4">
                                               <button type="submit" class="btn btn-primary">
                                                   {{ __('تسجيل الدخول') }}
                                               </button>

                                               <a class="btn btn-link" href="{{ route('password.request') }}">
                                                   {{ __('نسيت كلمة المرور؟') }}
                                               </a>
                                           </div>
                                       </div>
                                   </form>
                               </div>
                               </div> <!-- End of Login Card -->
                              </li>
                          </ul>
                      @else
                        <!-- User Profile Snippet (When Logged In)
                        SUGGESTION: in later stages, this part should be snipped out of the collapsed navbar
                              and represented with the user's icon.
                              @hzerrad
                          -->
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                    </ul>

                    <!-- Middle of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li> <a class="nav-link">عنوان</a> </li>
                        <li> <a class="nav-link">عنوان</a> </li>
                        <li> <a class="nav-link">عنوان</a> </li>
                        <li> <a class="nav-link">عنوان</a> </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
