<!-- this is used to extend from the app layout -->


<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->

<?php $__env->startSection('content'); ?>
    <!-- Masthead -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('<?php echo e(asset('images/slide/slide f.jpg')); ?>')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>First Slide</h3>
                        <p>This is a description for the first slide.</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('<?php echo e(asset('images/slide/slide 2.jpg')); ?>')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Second Slide</h3>
                        <p>This is a description for the second slide.</p>
                    </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('<?php echo e(asset('images/slide/slide 3.jpg')); ?>')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Third Slide</h3>
                        <p>This is a description for the third slide.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- events Showcases -->
    <div class="container mt-3 center" >
        <h3 class="center text-center">آخر اخبارنا</h3>
        <div class="row">
            <div class="col">
                <div class="card-deck-wrapper">
                    <div class="card-deck">
                        <?php if($events->count()>0): ?>
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card" style="">
                                    <div class="card-content">
                                        <div class="card-header bg-primary ">
                                            <h4 class="card-title text-right text-white"><?php echo e($event->title); ?></h4>
                                            <h6 class="card-subtitle text-right text-white"><?php echo e($event->location); ?></h6>
                                        </div>
                                        <img class="img-fluid hoverZoomLink" style="height: 250px;width: 100%" src="<?php echo e(asset('images/EventImages/'.$event->event_image)); ?>" alt="<?php echo e($event->title); ?>">
                                        <div class="card-body">
                                            <p class="card-text"><?php echo $event->description; ?></p>
                                            <a href="#" align="right" class="card-link pink btn btn-outline-primary float-right m-3 text-right">اقرأ اكثر</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="center" style="width: 10%; margin: 10px auto;"  ><?php echo e($events->links("pagination::bootstrap-4")); ?></div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>