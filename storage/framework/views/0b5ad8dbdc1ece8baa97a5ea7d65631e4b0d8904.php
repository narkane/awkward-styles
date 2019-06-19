<?php $__env->startSection('content'); ?>


<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
                <div class="card shadow  signup mt-4">
                    <div class="card-body">
                        <h2>Sign Up</h2>

                        <div class="row">
                            <div class="col-md-5">
                                 <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                                  <?php echo e(csrf_field()); ?>


                                    
                                     <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            

                            
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus placeholder="First Name">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            
                        </div>

                         <div class="form-group<?php echo e($errors->has('lastname') ? ' has-error' : ''); ?>">
                            

                            
                                <input id="lastname" type="text" class="form-control" name="lastname" value="<?php echo e(old('lastname')); ?>" required autofocus placeholder="Last Name">

                                <?php if($errors->has('lastname')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('lastname')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            

                            
                                <input id="email" type="email" placeholder="Email Address" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            

                            
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                           
                        </div>

                        <div class="form-group">
                           

                            
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                            
                        </div>
                        <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                    I Accept the Terms of Use & Privacy Policy
                                              </label>
                                        </div>
                                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>


                                </form>
                            </div>
                            <div class="col-md-2 align-self-center">
                                <div class="or mt-4">
                                    <span>OR</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-sm-12 mt-4">
                                        <button type="button" class="btn btn-facebook  btn-block"><span class="icon-facebook-f"></span> Sign in with Facebook</button>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button type="button" class="btn btn-google  btn-block"><span class="icon-google-plus-g"></span> Sign in with Google</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>