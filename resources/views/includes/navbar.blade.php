<!-- this is the navbar all our pages -->
<nav class="navbar navbar-expand-md navbar-light bg-light nav-tabs">
  <!-- this button is for mobile phones -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbars">
      <ul class="nav navbar-nav flex-row justify-content-between mr-auto">
      <!-- this is the Login dropDown button -->
      <li class="dropdown order-1"> 
          <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">دخول <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-menu-left mt-2">
             <li class="px-3 py-2">
               <!-- this is the login form -->
                 <form class="form" role="form">
                      <div class="form-group">
                        <!-- this is the email input field -->
                          <input id="emailInput" style="text-align:right" placeholder="الاسم" class="form-control form-control-sm" type="email" required="">
                      </div>
                      <div class="form-group">
                        <!-- this is the password input field -->
                          <input id="passwordInput" style="text-align:right" placeholder="كلمة السر" class="form-control form-control-sm" type="password" required="">
                      </div>
                      <div class="form-group">
                        <!-- this is the login(submit) button -->
                          <button type="submit" class="btn btn-primary btn-block">دخول</button>
                      </div>
                      <div class="form-group text-center">
                        <!-- this is the forget password link -->
                        <small><a href="#" data-toggle="modal" data-target="#modalPassword">نسيت كلمة السر ؟</a></small>
                      </div>
                  </form>
              </li>
          </ul>
      </li>
  </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <!-- this is the about link -->
          <a class="nav-link {{ Route::currentRouteNamed('about') ? 'active' : '' }}" href="/about">تعرف علينا</a>
        </li>
        <!-- this is the groups dropdown button -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الأفواج</a>
          <div class="dropdown-menu align-items-center" aria-labelledby="dropdown04">
            <a class="dropdown-item align-items-center" style="text-align:center" href="#">الأشبال</a>
            <a class="dropdown-item" style="text-align:center" href="#">الكشاف</a>
            <a class="dropdown-item" style="text-align:center" href="#">الجوالة</a>
          </div>
        </li>
        <li class="nav-item">
          <!-- this is the news link -->
          <a class="nav-link" href="#">الأخبار</a>
        </li>
        <li class="nav-item">
          <!-- this is the index link -->
          <a class="nav-link {{ Route::currentRouteNamed('index') ? 'active' : '' }}" href="/">الرئيسية</a>
        </li>
      </ul>
    </div>
    <!-- this is the website Logo -->
    <a class="navbar-brand" href="/"><img src="{{ asset('images/falah.png') }}" width="35" height="35"></img></a>
  </nav>