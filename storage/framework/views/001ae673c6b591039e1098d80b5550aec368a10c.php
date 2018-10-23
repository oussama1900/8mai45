<!-- this is used to extend from the app layout -->

<head>
    <link rel="stylesheet" href="/css/landing.css">
</head>
<!-- this is the content of our index page  ,
    all of the page content must be inside the content section -->
<?php $__env->startSection('content'); ?>
    <!-- Masthead -->
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ul class="carousel-indicators">
                <?php $__currentLoopData = $carousels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index == 0): ?>
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <?php else: ?>
                        <li data-target="#demo" data-slide-to="<?php echo e($loop->index); ?>"></li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <div class="carousel-inner">
                <?php $__currentLoopData = $carousels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carousel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->index == 0): ?>
                        <div class="carousel-item active" style="background-image: url('<?php echo e(asset('/images/Carousel').'/'.$carousel->image); ?>')">
                            <div class="carousel-caption">
                                <h3 style="position: absolute;bottom: 50px;left: 35%"><?php echo e($carousel->description); ?></h3>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="carousel-item" style="background-image: url('<?php echo e(asset('/images/Carousel').'/'.$carousel->image); ?>')">
                            <div class="carousel-caption">
                                <h3 style="position: absolute;bottom: 50px;left: 35%"><?php echo e($carousel->description); ?></h3>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <div class="row header" style="text-align: center;margin-top:20px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">آخر أخبارنا </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">آخر أخبارنا وآخر النشاطات في فوجنا العريق </h4>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey"> فوج الفلاح </h4>
        </div>
    </div>

    <!--start posts -->
    <div class=" mt-3 ">

            <?php echo $__env->make('includes.news_landing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>



    <div class="row header" style="text-align: center;margin-top:40px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">محطاتنا القادمة </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">محطاتنا القادمة وانشطتنا المرتقبة</h4>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey"> قريبا </h4>
        </div>
    </div>
    <div class=" mt-3 ">
        <div class="row">
            <?php echo $__env->make('includes.events_landing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div class="row header" style="text-align: center;margin-top:40px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">وحدات الفوج </h3>
        </div>
        <div style="text-align: center;width:100%">
            <h4 class="title" style="text-align: center;color:grey">القلب النابض للفوج ، بهم نفتخر </h4>
        </div>
        <div class=" mt-3 ">
            <div class="row">
                <?php echo $__env->make('includes.news_landing_page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>

    <div class="row header" style="text-align: center;margin-top:40px">
        <div style="text-align: center;width:100%">
            <h3 class="title" style="text-align: center">مواقع كشفية </h3>
        </div>

        <div class=" mt-3 ">
            <div class="row" >
               <div class="col-md-3 card website" style="display:table-cell;margin:0 auto;padding-left:0px;padding-right: 0px">

                   <a  href="http://www.scouts-dz.org/" target="_blank">
                       <img src="/images/algerianwebsite.png" class="image" style="width:100%;height:150px"/>
                   </a>
               </div>
                <div class="col-md-3 card website" style="display:table-cell;margin:0 auto;padding-left:0px;padding-right: 0px">

                    <a  href="https://www.scout.org/ar" target="_blank">
                        <img src="/images/worldscout.png" class="image" style="width:100%;height:150px"/>
                    </a>
               </div>
                <div class="col-md-3 card website" style="display:table-cell;margin:0 auto;padding-left:0px;padding-right: 0px" >

                    <a  href="https://www.scout.org/ar/arab" target="_blank">
                        <img src="/images/arabic-region.png" class="image" style="width:100%;height:150px"/>
                    </a>

               </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('og'); ?>
    <meta property="og:title" content="الموقع الرسمي لفوج الفلاح" />
    <meta property="og:image" content="https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/18835730_1701449486822767_2312127021052390335_n.jpg?_nc_cat=110&_nc_ht=scontent-cdg2-1.xx&oh=cd825a0c4d827b279c38b8729d706544&oe=5C4062E0" />
    <meta property="og:description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة" />
    <meta property="og:type" content="website" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <title> الموقع الرسمي لفوج الفلاح </title>
    <meta name="description" content="تربية النشأ و تحقيق استمرارية الفوج و الأفراد من أجل الانتشار الأوسع في المجتمع من خلال تأسيس كشفية جديدة">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('icon'); ?>
    <link rel="icon" href="<?php echo e(asset('/images/landing_page_Logo.png')); ?>" >
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web_template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>