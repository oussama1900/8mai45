<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap core CSS -->
        <link href="<?php echo e(asset('assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

        <!-- Custom css -->
        <link href="<?php echo e(asset('assets/css/navbar.css')); ?>" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/owl.carousel.css')); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/owl.theme.default.css')); ?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo e(asset('assets/css/flipclock.css')); ?>" />
        <!-- Website icon -->
        <link rel="icon" href="<?php echo e(asset('images/landing_page_logo.png')); ?>" >

        <!-- Custom fonts for this template -->
        <link href="<?php echo e(asset('assets/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo e(asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')); ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->

        <link href="<?php echo e(asset('assets/css/full-slider.css')); ?>" rel="stylesheet">
    	<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/filter-gallery.js')); ?>"></script>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title>الموقع الرسمي لفوج الفلاح  </title>

    </head>
    <body style="overflow-x:hidden">
        <div id="app">
            <?php echo $__env->make("includes.navbar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <main>
                <?php echo $__env->yieldContent('content'); ?>

            </main>
        </div>
        <?php echo $__env->make("includes.footer", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/main.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/flipclock.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/capJs.js')); ?>"></script>
    </body>

</html>
