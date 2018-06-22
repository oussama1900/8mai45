<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <title><?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_title); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  </title>
  
  <?php echo $__env->make('includes.dashdeps.predeps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  
	<style>
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
	</style>

</head>


<body class="dashboard app-mailbox">
  <div id="app">
    <!-- Top Navigation Bar -->
    <?php echo $__env->make('includes.dashbars.topnavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('includes.dashbars.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  <!-- Page -->
  <div class="page" style="animation-duration: 800ms; opacity: 1;">
	   <?php echo $__env->yieldContent('content'); ?>
  </div>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="site-footer-legal">© <?php echo e(date('Y')); ?> <a href="<?php echo e(URL::to('/')); ?>"><?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_name); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></a></div>
    <div class="site-footer-right">
     <?php echo e(trans('app.email')); ?> <i class="red-600 wb wb-heart"></i>  <?php $__currentLoopData = $settingdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($view->app_email); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
  </footer>
  <?php echo $__env->make('includes.dashdeps.dependencies', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>








