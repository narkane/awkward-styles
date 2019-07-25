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
    <link href="<?php echo e(asset('css/owl.carousel.min.css')); ?>" rel="stylesheet" type="text/css" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <script type="text/javascript" src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu-toggle').hover(function() {
                $('.dropdown-submenu-toggle').find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                $('.dropdown-submenu-toggle').stop(true, true).removeClass("active");
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                $(this).stop(true, true).addClass("active");
            }, function() {

                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                $(this).stop(true, true).addClass("active");
            });
        });
    </script>

</head>
<body>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
<!--
<footer>
    include('layouts.footer');
</footer>

 Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

-->
</body>
</html>
