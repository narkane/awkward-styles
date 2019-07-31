<?php $__env->startSection('content'); ?>
<div class="product-container bg-white p-5">

    <div class="row">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="/list">Home</a></li>
                    <li class="breadcrumb-item"><a href="/products">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"
                        id="current_category"><?php echo e($category); ?></li>
                </ol>
            </nav>

                <div class="row">
                    <div class="col-2 p-3 border-right">

                        <h2><?php echo e($category); ?></h2>

                        <?php if(in_array($category,$cloth_cats)): ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/shirt?count=<?php echo e($take); ?>" title="T-Shirts">T-Shirts</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/tank?count=<?php echo e($take); ?>" title="TankTops">Tank Tops</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/hoodie?count=<?php echo e($take); ?>" title="Hoodies">Hoodies</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/jacket?count=<?php echo e($take); ?>" title="Jackets">Jackets</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/sweatshirt?count=<?php echo e($take); ?>" title="SweatShirt">Sweat Shirts</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/pants?count=<?php echo e($take); ?>" title="Pants">Pants</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/<?php echo e($category); ?>/shorts?count=<?php echo e($take); ?>" title="Shorts">Shorts</a></h4>
                            </li>
                        </ul>
                        <?php endif; ?>

                        <h3>Categories</h3>
                        <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($cats == $category): ?>
                                <li class="list-group-item active">
                                    <?php echo e($cats); ?>

                                </li>
                                <?php elseif(in_array($cats,$cloth_cats)): ?>
                                <li class="list-group-item">
                                    <h5><a href="/products/<?php echo e($cats); ?>/<?php if($type!=null): ?><?php echo e($type); ?><?php endif; ?>" title="<?php echo e($cats); ?>"><?php echo e($cats); ?></a></h5>
                                </li>
                                <?php else: ?>
                                    <li class="list-group-item">
                                        <h5><a href="/products/<?php echo e($cats); ?>/" title="<?php echo e($cats); ?>"><?php echo e($cats); ?></a></h5>
                                    </li>
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                    </div>

                    <div class="col-10">
                        <div class="row">
                            <div class="col-sm-7">
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
                            <div class="col-sm-5 text-right">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="totalCount" class="d-inline">Filter Items Per Page</label>
                                        <select class="form-control w-25 d-inline" id="totalCount">
                                            <?php for($i = 25; $i <= 100; $i+=25): ?>
                                                <?php if($i == $take): ?>
                                                    <option value="<?php echo e($i); ?>"selected><?php echo e($i); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <h5>
                                            <span class="badge badge-pill badge-light rounded-border py-2 px-5 border border-dark">
                                                Found <u><?php echo e($totalFound); ?></u> results
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                        <div class="row products-row" id="art-product-list">

                            <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($prod->full_url)): ?>
                                <div class="product-content p-2 text-center">
                                    <img src="<?php echo e($prod->full_url); ?>" class="product-image">
                                    <h6 class="product-detals"><?php echo e($prod->label); ?></h6>
                                    <h4 class="product-price">$ <?php echo e(number_format((float)$prod->salePrice, 2, '.', '')); ?></h4>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <div class="row">
                            <div class="col-sm-9">
                                <h5>
                                    <div id="carouselPaginationContainerTwo" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left"
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

                                        <a class="carousel-control-prev" href="#carouselPaginationContainerTwo" role="button" data-slide="prev">
                                            <span class="carousel-control-arrow-icon-left" aria-hidden="true"></span>
                                            <span class="sr-only text-dark">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselPaginationContainerTwo" role="button" data-slide="next">
                                            <span class="carousel-control-arrow-icon-right" aria-hidden="true"></span>
                                            <span class="sr-only text-dark">Next</span>
                                        </a>
                                    </div>
                                </h5>
                            </div>
                            <div class="col-sm-1 text-right">
                                <h5><span class="badge badge-pill badge-light rounded-border py-2 px-5 border border-dark">
                                        Found <u><?php echo e($totalFound); ?></u> results
                                    </span></h5>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    <style>
        .product-container {
            width: 100%;
            margin: 0;
            margin-top: 100px;
            background-color: #ffffff;
            padding: 20px;
        }
    </style>
    <?php $__env->startSection('footer_scripts'); ?>
        <script>
            $(document).ready(function(){
                $("#totalCount").on('change', function(){
                    var url = window.location.href.split("?")[0];
                    window.location.href = url + "?count=" + $(this).val();
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>