<?php $__env->startSection('content'); ?>

<div class="row products-row" style="float:left;border:3px inset lightblue;height:100%;">
    <div id="art-product-list">
        <div id="app">
            <thetool prodid="<?php echo e($product_id); ?>"/>
        </div>
    </div>

   <div  style="position:absolute;z-index:-20;padding:0px 150px;">
            <div class="product-image">
                <a href="<?php echo e(url('/')); ?>/product-details/<?php echo e($request->id); ?>">
                    <img id="productImage" src="<?php echo e($request->full_url); ?>" style="border:1px solid black;"/>
                    <br/><?php echo e($request->id); ?>

                </a>
            </div>
            <div class="product-content">
                <h5 class="title"><?php echo e($request->label); ?></h5>
                <div class="price">
                    <?php echo e($request->salePrice); ?>

                </div>
            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.toolHead', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>