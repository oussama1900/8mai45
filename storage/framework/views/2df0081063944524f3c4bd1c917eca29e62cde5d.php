<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title>فوج الفلاح</title>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <!-- Include Date Range Picker -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>



  <?php echo $__env->make('includes.dashdependencies.predeps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
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
      padding-top:30px;
    }
    .site-navbar {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
      height: 80px;
    }
    .font_kufi {
      font-family: "DroidArabicKufiRegular", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; 
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
	</style>
</head>

<body class="dashboard app-mailbox">
    <?php echo $__env->make('includes.dashbars.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div id="app"> 
    <?php echo $__env->make('includes.dashbars.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Page -->
    <div class="page" style="animation-duration: 800ms; opacity: 1;">
      <router-view></router-view>
    </div>
  </div>


  <?php echo $__env->make('includes.dashdependencies.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <!-- Vue.js -->
  <script src=<?php echo e(url("/assets/vue/app.js")); ?>></script>
</body>
</html>