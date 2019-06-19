<?php $__env->startSection('content'); ?>
    <div>
        <img src="<?php echo e(asset('images/SellAnything-img.png')); ?>" class="img-100" alt="">
    </div>
    <div class="container">
        <div class="pannel">
            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-5">
                        <h3>Sell Anything. Sell Anything</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                            specimen book.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="<?php echo e(asset('images/icons/edit-document.png')); ?>" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="<?php echo e(asset('images/icons/add-file.png')); ?>" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="<?php echo e(asset('images/icons/turn-off.png')); ?>" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 SellAnything-list">
                            <div class="media">
                                <span class="SellAnything-icon"> <img src="<?php echo e(asset('images/icons/coin.png')); ?>" alt="..."></span>
                                <div class="media-body">
                                    <h5 class="mt-0">Media heading</h5>
                                    <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="button" class="btn btn-primary">Start Selling</button>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="testimonials">
                        <div class="owl-carousel" id="owl-testimonials" style="display:block">
                            <div class="item">
                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                                <h5>Praveen Bituku</h5>
                                <span>Hyderabad</span>
                            </div>
                            <div class="item">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book.</p>
                                <h5>Bituku Praveen </h5>
                                <span>Karimnagar</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer_scripts'); ?>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $("#owl-testimonials").owlCarousel({
        nav: true,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        items: 1,
    });
});
</script>
<style>
main.py-4 {
    padding-top: 0px !important;
}
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>