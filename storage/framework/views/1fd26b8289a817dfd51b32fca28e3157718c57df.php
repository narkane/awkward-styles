<?php $__env->startSection('content'); ?>

<div class="container h-100">

    <?php echo e(var_dump($art)); ?>



</div>
                  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>