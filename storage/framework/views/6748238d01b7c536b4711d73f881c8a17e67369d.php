;

<?php $__env->startSection('content'); ?>
    <link href="<?php echo e(asset('css/affiliates.css')); ?>" rel="stylesheet">
    <div class="pannel">
        <div class="color">
            <!-- <img src="<?php echo e(asset('images/affiliate.png')); ?>" style="position:relative;left:50px;height:25%;width:25%;"> -->
            <img src="<?php echo e(asset('images/dollarshirt.png')); ?>" style="height:600px;width:600px;position:relative;left:-300px;" class="img-100" alt="">
          <input type="text" id="signup_email" placeholder="email@host.com">
          <button>JOIN US!</button>
            <div class="bigtext" style="position:relative;left:450px;top:-450px;"><h1>AWKWARD STYLES'<br>PARTNER PROGRAM</h1>
            <p style="position:relative;left:25px;">
              Awkward Styles' Partner Program enables you to<br>
              engage your fans and make money through merchandise.<br><br>
              <b style="position:relative;left:-20px;top:-15px;">Your fans love you, now let them show it off!</b>
            </p>
            </div>
          </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>