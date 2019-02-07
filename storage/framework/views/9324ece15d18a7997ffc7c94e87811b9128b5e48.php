<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <link rel="icon" href="<?php echo e(asset('/images/landing_page_Logo.png')); ?>" >
  <link rel="stylesheet" href="/css/app.css"/>
  <title>الادارة الالكترونية</title>



  <!-- Include Date Range Picker -->





  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">


  <?php echo $__env->make('includes.dashdependencies.predeps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <style>

     .site-menu-title{
          font-size:18px !important;
      }

    .dashboard{
      background-color: #e6f2ff;
    }
    .page{
      background-color: #0b0b0b;
    }
   
    .page-content {
      padding: 0px 30px;
      font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
    }
    .site-menubar {
      font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
      padding-top:30px;
    }
    .site-navbar {
      font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif !important;
      height: 80px;
    }
    .font_kufi {
      font-family: "Alarabiya Font",'Segoe UI', Tahoma, Geneva, Verdana,sans-serif!important;
      font-size: 100%;
    }
    .navbar-header{
      height: 80px;
    }

    .navbar-brand{
      position: absolute;
      float: right;
      margin-left: 100px;
    }

    .navbar-brand-logo{
      margin-top: 10px;
      margin-right: 10px !important;
      margin-left: 10px !important;
      width: 55px;
      height: 55px;
    }
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }
    .slidePanel{
      margin-top: 14px;
      width: 1000px;
      transition: 0.5s;

    }
    .control-sidebar-tabs{

      height: 60px;
      margin-bottom:0px;
      /*background-color: #62a8ea;*/
      background-color: #263238;
    }
    .chat-element{
      height: 60px;
      background-color: #222d32;
    }
    .chat-element, .friend-element{
      height: 60px;

    }

    .chat-element:hover , .friend-element:hover{
      background-color: #222d32;
      cursor: pointer;

    }
    .sidebar-body{
      background-color: #222d32;
      height:100%;

    }
    .sidebar-body .friend-list{
      display: none;
    }

  </style>
</head>

<body class="dashboard app-mailbox">

<?php echo $__env->make('includes.dashbars.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div id="app">
  <vue-loading :active.sync="$root.isLoading"
           :can-cancel="false"
           :loader="$root.dots"
           :color="$root.color"
           :width="$root.width"
           :height="$root.height"
           :is-full-page="$root.fullPage"></vue-loading>
<?php echo $__env->make('includes.dashbars.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Page -->
  <div class="page" style="animation-duration: 2000ms; opacity: 1;">
    <router-view></router-view>
  </div>
</div>


<?php echo $__env->make('includes.dashdependencies.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- Vue.js -->
<script src=<?php echo e(url("/assets/vue/app.js")); ?> charset="UTF-8"></script>

<script src="https://unpkg.com/vue-ckeditor2"></script>
<script src="https://cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


</body>
</html>
