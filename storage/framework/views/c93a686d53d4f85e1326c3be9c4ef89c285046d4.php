<?php $__env->startSection('content'); ?>

<div class="container panel">

    <div class="row">
        <div class="col-md-12">
            <div class="pannel">
                <div class="row">
                    <div class="col-sm-8">
                        <h5 class="title2">Products</h5>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="btn-group btnSort-section" role="group">
                            <span>
                                Sort:
                            </span>
                            <button id="btnSort" type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Top Selling
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnSort">
                                <a class="dropdown-item" href="#">Top Selling</a>
                                <a class="dropdown-item" href="#">Top Selling</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <h5>
                            <div id="carouselPaginationContainer" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left"
                                 data-ride="carousel" data-interval="false">

                                <div class="carousel-inner px-3">
                                    <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area => $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="carousel-item <?php if($area == $paginatorArea): ?> active <?php endif; ?>">
                                            Page(s):

                                        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($page == $currentPage): ?>
                                                <?php echo e($page); ?>

                                            <?php else: ?>
                                                <a href="<?php echo e($url); ?>page=<?php echo e($page); ?>" title="Page <?php echo e($page); ?>"><?php echo e($page); ?></a>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </div>

                                <a class="carousel-control-prev" href="#carouselPaginationContainer" role="button" data-slide="prev">
                                    <span class="carousel-control-arrow-icon-left" aria-hidden="true"></span>
                                    <span class="sr-only text-dark">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselPaginationContainer" role="button" data-slide="next">
                                    <span class="carousel-control-arrow-icon-right" aria-hidden="true"></span>
                                    <span class="sr-only text-dark">Next</span>
                                </a>
                            </div>
                        </h5>
                    </div>
                    <div class="col-md-2 text-right">
                        <h5><span class="badge badge-pill badge-light rounded-border py-2 px-5 border border-dark">Found <u><?php echo e($totalFound); ?></u> results</span></h5>
                    </div>
                </div>

                <div class="row products-row" id="art-product-list">

                    <?php if(isset($request)): ?>
                        <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($req->id)): ?>
                                <div class="col item">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="<?php echo e(url('/')); ?>/product-details/<?php echo e($req->id); ?>">
                                                <img src="<?php echo e($req->full_url); ?>">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="title"><?php echo e($req->label); ?></h5>
                                            <div class="price">
                                                <?php echo e($req->salePrice); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>

                <nav aria-label="Page navigation example" class="w-100 text-center">
                    <h5>
                        <?php if($currentPage > 1): ?>
                            <a href="<?php echo e($url); ?>page=<?php echo e($currentPage - 1); ?>" title="Previous">Previous Page</a>
                        <?php endif; ?>

                        <div id="carouselPaginationContainerTwo" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left"
                             data-ride="carousel" data-interval="false">

                            <div class="carousel-inner px-5">
                                <?php $__currentLoopData = $paginator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area => $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <div class="carousel-item <?php if($area == $paginatorArea): ?> active <?php endif; ?>">
                                        Page(s):

                                        <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($page == $currentPage): ?>
                                                <?php echo e($page); ?>

                                            <?php else: ?>
                                                <a href="<?php echo e($url); ?>page=<?php echo e($page); ?>" title="Page <?php echo e($page); ?>"><?php echo e($page); ?></a>
                                            <?php endif; ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>

                            <a class="carousel-control-prev" href="#carouselPaginationContainerTwo" role="button" data-slide="prev">
                                <span class="carousel-control-arrow-icon-left" aria-hidden="true"></span>
                                <span class="sr-only text-dark">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselPaginationContainerTwo" role="button" data-slide="next">
                                <span class="carousel-control-arrow-icon-right" aria-hidden="true"></span>
                                <span class="sr-only text-dark">Next</span>
                            </a>
                        </div>

                        <?php if($currentPage < $totalPages): ?>
                            <a href="<?php echo e($url); ?>page=<?php echo e($currentPage + 1); ?>" title="Next">Next Page</a>
                        <?php endif; ?>
                    </h5>
                </nav>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('footer_scripts'); ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#collections-slider").owlCarousel({
            margin: 10,
            nav: true,
            slideSpeed: 800,
            paginationSpeed: 800,
            singleItem: true,
            pagination: true,
            autoPlay: true,
            stopOnHover: true,
            items: 8,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 8
                }
            }
        });

        
    });
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>