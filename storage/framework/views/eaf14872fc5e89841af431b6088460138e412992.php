<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $__env->yieldContent('aimeos_header'); ?>
    <title>AWKWARD Styles</title>
    <?php echo $__env->yieldContent('aimeos_styles'); ?>
    <link type="text/css" rel="stylesheet" href='https://fonts.googleapis.com/css?family=Roboto:400,300'>
    <link href="<?php echo e(asset('css/graphic-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/theme.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/Custom.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

    <!-- <script src="<?php echo e(asset('js/app.js')); ?>"></script> -->

    <script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>

    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css" media="all"/>
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <script src="<?php echo e(asset('js/search.js')); ?>"></script>
</head>
<body>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<main>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</main>

<footer>
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('footer_scripts'); ?>
</footer>
<!-- Scripts -->
</body>
</html>
