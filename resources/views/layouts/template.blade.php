<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>فوج الفلاح  </title>
  
  @include('includes.dashdependencies.predeps')
  
	<style>
      .dashboard{
        background-color: #e6f2ff;
      }
      .page{
        background-color: #0b0b0b;
      }
    .page-content {
      padding: 0px 30px;
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }
    .site-menubar {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
    }
    .site-navbar {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
    }
    .font_kufi {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
      font-size: 100%;
    }

    .navbar-brand{
      position: absolute;
      float: right;
      margin-left: 100px;
    }

      .navbar-brand-logo{
        margin-top: -15px;
        margin-right: 20px !important;
        width: 55px;
        height: 55px;
      }
	</style>
</head>

<body class="dashboard app-mailbox">
    @include('includes.dashbars.topnavbar')
  <div id="app"> 
    @include('includes.dashbars.sidebar')
    <!-- Page -->
    <div class="page" style="animation-duration: 800ms; opacity: 1;">
      <router-view></router-view>
    </div>
  </div>

  @include('includes.dashdependencies.scripts')

  <!-- Vue.js -->
  <script src={{ url("/assets/vue/app.js")}}></script>
</body>
</html>