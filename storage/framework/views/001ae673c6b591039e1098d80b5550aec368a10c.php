<!-- this is used to extend from the app layout -->


<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
<?php $__env->startSection('content'); ?>
    <!-- Masthead -->
    <header class="masthead text-white text-center" style="background: url('<?php echo e(asset('images/slide/slide 2.jpg')); ?>') no-repeat center center">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <h1 class="mb-5">الكشافة الاسلامية الجزائرية </br>  فوج الفلاح</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- events Showcases -->
    <div class="container mt-3 center">
        <h3 class="center text-center">آخر اخبارنا</h3>
        <div class="row">
            <div class="col">
                <div class="card-deck-wrapper">
                    <div class="card-deck">
                        <?php if($events->count()>0): ?>
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card" style="">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo e($event->title); ?></h4>
                                            <h6 class="card-subtitle text-muted"><?php echo e($event->location); ?></h6>
                                        </div>
                                        <img class="img-fluid hoverZoomLink" src="<?php echo e(asset('images/EventImages/'.$event->event_image)); ?>" alt="<?php echo e($event->title); ?>">
                                        <div class="card-body">
                                            <p class="card-text"><?php echo e($event->description); ?></p>
                                            <a href="#" class="card-link pink">اقرأ اكثر</a>
                                            <a href="#" class="card-link pink">شيئ اخر</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>