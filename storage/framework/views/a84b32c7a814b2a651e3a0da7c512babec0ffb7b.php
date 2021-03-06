<?php $__env->startSection('content'); ?>
<?php 
$token = $tokenGen['token'];
?>
<div class="container">

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
                                <a class="dropdown-item" href="#">Lowest Price</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row products-row" id="art-product-list">
                    
                    
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" style="justify-content: flex-end !important;" id="mypagination">
                        
                    </ul>
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


        $.ajax({
            url: "<?php echo e(env('API_URL')); ?>api/product/getProductList?pageNumber=1&limit=50",
            contentType: 'application/json',
            dataType: 'json',
            headers: {
                "Authorization": "Bearer " + '<?php echo e($token); ?>',
                "Content-Type": "application/json"
            },
            type: 'GET',
            success: function(artProduct,textStatus, xhr) {
                if(xhr.status === 401) {
                    $('#art-product-list').html("Invalid access toekn..."); exit;
                }
                // console.log(artProduct);
                if(artProduct.properties.totalPages) {
                    if(artProduct.properties.totalPages > 20){
                        artProduct.properties.totalPages = 20; 
                    }
                    for(let j=1; j<=artProduct.properties.totalPages; j++) {
                        $('#mypagination').append(`
                            <li class="page-item"><a class="page-link" onClick="pagination(${j})">${j}</a></li>
                        `);
                    }
                    for(let i = 0; i < artProduct.properties.products.length; i++) {
                        $.ajax({
                            url: "<?php echo e(env('API_URL')); ?>api/media/getById/" +
                            artProduct.properties.products[i].image.split(",")[0],
                            contentType: 'application/json',
                            dataType: 'json',
                            headers: {
                                "Authorization": "Bearer " + '<?php echo e($token); ?>',
                                "Content-Type": "application/json"
                            },
                            type: 'GET',
                            success: function(images) {
                                $('#art-product-list').append(`
                                    <div class="col-3 item">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="<?php echo e(url('/')); ?>/product-details/${artProduct.properties.products[i].id}">
                                                    <img src="${images.properties.full_url}">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h5 class="title">${artProduct.properties.products[i].label}</h5>
                                                <div class="price">
                                                    $${artProduct.properties.products[i].salePrice}
                                                </div>

                                            </div>
                                        </div>
                                    </div>                        
                                `);
                                console.log(images);
                                console.log(images.properties.full_url);
                            }
                        });          
                    }                            
                } else {
                    $('#art-product-list').html(`No Art Products to Display`);
                }                        
            },
            error: function(xhr,status,error) {
                $('#art-product-list').html("<br><br>Something went wrong...<br>");
            }
        });
    });
    function pagination(page) {
        console.log(page);
        $.ajax({
            url: "<?php echo e(env('API_URL')); ?>api/product/getProductList?pageNumber="+page+"&limit=50",
            contentType: 'application/json',
            dataType: 'json',
            headers: {
                "Authorization": "Bearer " + '<?php echo e($token); ?>',
                "Content-Type": "application/json"
            },
            type: 'GET',
            success: function(artProduct,textStatus, xhr) {
                if(xhr.status === 401) {
                    $('#art-product-list').html("Invalid access toekn...");
                }
                //console.log("----",artProduct);
                if(artProduct.properties.totalPages) {
                    $('#art-product-list').html("");
                    for(let i = 0; i < artProduct.properties.products.length; i++) {
                        $.ajax({
                            url: "<?php echo e(env('API_URL')); ?>api/media/getById/" +
                            artProduct.properties.products[i].image.split(",")[0],
                            contentType: 'application/json',
                            dataType: 'json',
                            headers: {
                                "Authorization": "Bearer " + '<?php echo e($token); ?>',
                                "Content-Type": "application/json"
                            },
                            type: 'GET',
                            success: function(images) {                                        
                                $('#art-product-list').append(`
                                    <div class="col-3 item">
                                        <div class="product-grid">
                                            <div class="product-image">
                                                <a href="<?php echo e(url('/')); ?>/product-details/${artProduct.properties.products[i].id}">
                                                    <img src="${images.properties.full_url}">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <h5 class="title">${artProduct.properties.products[i].label}</h5>
                                                <div class="price">
                                                    $${artProduct.properties.products[i].salePrice}
                                                </div>

                                            </div>
                                        </div>
                                    </div>                        
                                `);
                                console.log(images);
                                console.log(images.properties.full_url);
                                window.scrollTo(0, 0);
                            }
                        });                                
                    }                            
                } else {
                    $('#art-product-list').html(`No Art Products to Display`);
                }                        
            },
            error: function(xhr,status,error) {
                $('#art-product-list').html("Something went wrong...");
            }
        });
    }
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>