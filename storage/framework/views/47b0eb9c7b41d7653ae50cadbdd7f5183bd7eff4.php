<?php $__env->startSection('content'); ?>
<head>
<link href="<?php echo e(asset('css/theme.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/graphic-icons.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/Custom.css')); ?>" rel="stylesheet">
</head>
<style>
span.checkmark {
    z-index: 1;
}
</style>
<script>
function selectProduct(v) {
selectedproducts = $('#storeproducts').val();
if( selectedproducts.length == 0) {
  $('#storeproducts').val(v);
} else {
  if(selectedproducts.indexOf(v) != -1){
    if(selectedproducts.indexOf(','+v) != -1){
    selectedproducts = selectedproducts.replace(','+v, '');  
    } else if(selectedproducts.indexOf(v+',') != -1) {
    selectedproducts = selectedproducts.replace(v+',', '');  
    } else {
    selectedproducts = selectedproducts.replace(v, '');  
    }
    $('#storeproducts').val(selectedproducts);  
  } else {
  $('#storeproducts').val(selectedproducts+','+v);
}
}
if($('#storeproducts').val().length>0){
  $('#stylesbutton').attr('disabled',false);
} else {
  $('#stylesbutton').attr('disabled',true);
}
console.log($('#storeproducts').val());
}

function selectBrand(v) {
selectedBrands = $('#storeBrands').val();
if( selectedBrands.length == 0) {
  $('#storeBrands').val(v);
} else {
  if(selectedBrands.indexOf(v) != -1){
    if(selectedBrands.indexOf(','+v) != -1){
    selectedBrands = selectedBrands.replace(','+v, '');  
    } else if(selectedBrands.indexOf(v+',') != -1) {
    selectedBrands = selectedBrands.replace(v+',', '');  
    } else {
    selectedBrands = selectedBrands.replace(v, '');  
    }
    $('#storeBrands').val(selectedBrands);  
  } else {
  $('#storeBrands').val(selectedBrands+','+v);
}
}
if($('#storeBrands').val().length>0){
  $('#stylesbutton').attr('disabled',false);
} else {
  $('#stylesbutton').attr('disabled',true);
}
console.log($('#storeBrands').val());
 selectProductTab();
}
</script>
 
<div class="container">
  
    <div class="row">
       <div class="col-md-3">
       <?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>      
       </div>
     
     <div class="col-md-9">
        
     <div class="progressbar">

                    <ul class="nav nav-pills mb-3" id="progressbar-tab" role="tablist">
                        <li class="active">
                            <a id="progressbar-1-tab" data-toggle="pill" href="#progressbar-1" role="tab" aria-controls="progressbar-1" aria-selected="true">
                                <span>1</span>
                            </a>
                            <h6>Choose Artwork</h6>
                        </li>
                        <li class="disabled">
                            <a id="progressbar-2-tab" data-toggle="pill" href="#progressbar-2" role="tab" aria-controls="progressbar-2" aria-selected="false">
                                <span>2</span>
                            </a>
                            <h6>Select Product Type</h6>
                        </li>
                        <li class="disabled">
                            <a id="progressbar-3-tab" data-toggle="pill" href="#progressbar-3" role="tab" aria-controls="progressbar-3" aria-selected="false">
                                <span>3</span>
                            </a>
                            <h6>Select Product</h6>
                        </li>
                        <li class="disabled">
                            <a id="progressbar-4-tab" data-toggle="pill" href="#progressbar-4" role="tab" aria-controls="progressbar-4" aria-selected="false">
                                <span>4</span>
                            </a>
                            <h6>Set Pricing</h6>
                        </li>
                    </ul>

                </div>

                <div class="tab-content" id="progressbar-tabContent">
                    <div class="tab-pane show active" id="progressbar-1" role="tabpanel" aria-labelledby="progressbar-1-tab">
                        <div>
                        <div class="col-md-12 pricing-product-list">

                                    <h5 class="pricing-product-title2">Artworks</h5>
                                    <div class="row">
                        <?php if(count($artworks)>0): ?>
                        <?php $__currentLoopData = $artworks['properties']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artwork): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                                            <div class="pricing-product">
                                                <label class="checkbox-container">
                                                                    <input type="checkbox" 
                                        value="<?php echo e($artwork['mediaId']['full_url']); ?>" class="radio" artworkID="<?php echo e($artwork['mediaId']['full_url']); ?>" name="artwork">
                                                                    <span class="checkmark"></span>
                                                              <div class="product-wrap">
                                                                <div class="product-image">
                                                                <img src="<?php echo e($artwork['mediaId']['full_url']); ?>" width="100%">
                                                                </div>  
                                                                <div class="product-information">
                                                                    <h6 class="product-title"><?php echo e($artwork['artName']); ?></h6>
                        
                                                                </div> 
                                                              </div>  
                                                                </label>

                                            </div>

                                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>    
                        </div>
                        </div>
                        </div>
                        <div class="mt-3">
                            <div class="float-right">
                                <button type="button" class="btn btn-primary btn-md next-step ml-1" id="artworks_button" disabled>Save and continue</button>
                            </div>
                        </div>

                    </div>


<script type = "text/javascript"  src = "https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  console.log('function fired');
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
    $('#artworks_button').attr('disabled',false);
  } else {
    $box.prop("checked", false);
    $('#artworks_button').attr('disabled',true);
  }
});
</script>
                    <div class="tab-pane" id="progressbar-2" role="tabpanel" aria-labelledby="progressbar-2-tab">
                        <div>
                            <div class="row">


                                <div class="col-md-12 pricing-product-list">

                                    <h5 class="pricing-product-title2">Clothing</h5>
                                         <style>
                                 

                                    .product-image:hover .edit {
                                            display: block;
                                    }

                                    .edit {
                                            padding-top: 7px;
                                            padding-right: 7px;
                                            position: absolute;
                                            right: 0;
                                            top: 0;
                                            display: none;
                                    }

                                    .edit a {
                                            color: #000;
                                    }

                                    </style>


                                    <div class="row">
                                    <input type="hidden" id="storeproducts" name="selectedproducts">
                                        <?php if(count($styles)>0): ?>
                                        <?php $__currentLoopData = $styles['properties']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-3">
                                            <div class="pricing-product">
                                                <label class="checkbox-container">
                                                                    <input type="checkbox" onclick="selectProduct(<?php echo e($style['id']); ?>)" id="<?php echo e($style['id']); ?>">
                                                                    <span class="checkmark"></span>
                                                              <div class="product-wrap">
                                            <div class="product-image" style="position: relative;
                                            display: inline-block;">
                                                                        <img id="style_<?php echo e($style['id']); ?>" src="images/images/Sample-img.jpg" width="100%"> 
                                                                         
 <div class="edit"   data-toggle="modal" data-target="#myModal<?php echo e($style['id']); ?>"   >edit</div>
<div id="myModal<?php echo e($style['id']); ?>" class="modal" role="dialog">
  <div class="modal-dialog"  >

    <?php if($style['id']==1): ?>

 <script defer src="<?php echo e(url('/')); ?>/mockupgen_assets/js/html2canvas.js"></script>
  <script defer src="<?php echo e(url('/')); ?>/mockupgen_assets/js/art_canvas2.js"></script>
   <script src="https://unpkg.com/konva@2.4.2/konva.min.js"></script>
      <style>
                .modal-dialog {
    max-width: 600px !important;
    max-height: 620px !important;
    margin: 1.75rem auto;
}
        </style>
        <script type="text/javascript">
                
                 function showImagetoMainScreen(id){
                    console.log("addP");
                        deselectAll();
                        html2canvas(document.getElementById("print_canvas"+id)).then(canvas => {
                            //document.getElementById("style_"+this.id).appendChild(canvas)
                            console.log(canvas,"id",id);
                             $('#style_<?php echo e($style['id']); ?>').attr('src',canvas);                             
                        });
                        $("#myModal"+id).trigger('click');

                    }



        </script>

     <?php endif; ?>
        <script>
        $(document).ready(function() {
                $("#myModal<?php echo e($style['id']); ?>").on('shown.bs.modal', function (e) {
                  // do cool stuff here all day… no need to change bootstrap
                                console.log("modeal loaded");
                        myFunction( $("input[name='artwork']:checked").val(),ArtItemType.IMAGE,"<?php echo e($style['id']); ?>");
                        setShirtImage( $("#style_<?php echo e($style['id']); ?>_1").val() , "<?php echo e($style['id']); ?>");
                                        console.log("asfadsf");
                });

        });

</script>



   <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
     <div id="print_canvas<?php echo e($style['id']); ?>"  style="width:560px; height:600px; margin:0 auto; border:1px solid black; position: relative;">
                  <input type="hidden" id="style_<?php echo e($style['id']); ?>_1">
                  <div id="container_shirt<?php echo e($style['id']); ?>" style="width:560px; height:600px;"></div> 
                  <div id="canvas_parrent<?php echo e($style['id']); ?>" style="

                  <?php if($style['id']==17): ?> 
                  width:68%; height:38%; left: 50%;top: 50%;
                  <?php elseif($style['id']==16): ?>
                  width:40%; height:40%; left: 50%;top: 66%;
                  <?php elseif($style['id']==14): ?>
                  width:60%; height:60%; left: 50%;top: 50%;
                  <?php elseif($style['id']==13): ?>
                  width:40%; height:45%; left: 60%;top: 56%;
                  <?php elseif($style['id']==7): ?>
                  width:40%; height:50%; left: 50%;top: 50%;
                  <?php else: ?>
                  width:40%; height:60%; left: 50%;top: 50%;
                   <?php endif; ?>

                  margin:0 auto; border:1px solid #3c3c3c;position: absolute;z-index: 9999;transform:translate(-50%,-50%);">
                    <div id="container<?php echo e($style['id']); ?>"></div>
                  </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" onClick="showImagetoMainScreen('<?php echo e($style['id']); ?>');" class="btn btn-primary">Save changes</button>
       
      </div>
    </div>


  </div>
</div>

                                                                </div>  
                                                                <div class="product-information">
                                                                    <h6 class="product-title"><?php echo e($style['label']); ?></h6>
                        
                                                                </div> 
                                                              </div>  
                                                                </label>

                                            </div>

                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                         

                                    </div>
                                    <h5 class="pricing-product-title2">Home</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="pricing-product">
                                                <label class="checkbox-container">
                                                                    <input type="checkbox" >
                                                                    <span class="checkmark"></span>
                                                              <div class="product-wrap">
                                                                <div class="product-image">
                                                                        <img  src="images/images/Sample-img.jpg" width="100%">
                                                                </div>  
                                                                <div class="product-information">
                                                                    <h6 class="product-title">Product Title</h6>
                        
                                                                </div> 
                                                              </div>  
                                                                </label>

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="pricing-product">
                                                <label class="checkbox-container">
                                                                    <input type="checkbox" >
                                                                    <span class="checkmark"></span>
                                                              <div class="product-wrap">
                                                                <div class="product-image">
                                                                        <img  src="images/images/Sample-img.jpg" width="100%">
                                                                </div>  
                                                                <div class="product-information">
                                                                    <h6 class="product-title">Product Title</h6>
                        
                                                                </div> 
                                                              </div>  
                                                                </label>

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="pricing-product">
                                                <label class="checkbox-container">
                                                                    <input type="checkbox" >
                                                                    <span class="checkmark"></span>
                                                              <div class="product-wrap">
                                                                <div class="product-image">
                                                                        <img  src="images/images/Sample-img.jpg" width="100%">
                                                                </div>  
                                                                <div class="product-information">
                                                                    <h6 class="product-title">Product Title</h6>
                        
                                                                </div> 
                                                              </div>  
                                                                </label>

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="pricing-product">
                                                <label class="checkbox-container">
                                                                    <input type="checkbox" >
                                                                    <span class="checkmark"></span>
                                                              <div class="product-wrap">
                                                                <div class="product-image">
                                                                        <img  src="images/images/Sample-img.jpg" width="100%">
                                                                </div>  
                                                                <div class="product-information">
                                                                    <h6 class="product-title">Product Title</h6>
                        
                                                                </div> 
                                                              </div>  
                                                                </label>

                                            </div>

                                        </div>
                                        


                                    </div>
                                    <!--  <nav aria-label="Page navigation">
                                                        <ul class="pagination justify-content-end pricing-product-pagination">
                                                            <li class="page-item">
                                                                <a class="page-link" href="#" tabindex="-1">Prev</a>
                                                            </li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                            <li class="page-item">
                                                                <a class="page-link" href="#">Next</a>
                                                            </li>
                                                        </ul>
                                                    </nav> -->






                                </div>


                            </div>



                        </div>

                        <div class="mt-3">
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="button" class="btn btn-primary btn-md next-step ml-2" id="stylesbutton" disabled>Save and continue</button>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="progressbar-3" role="tabpanel" aria-labelledby="progressbar-3-tab">
                        <div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h5 class="pricing-product-title2">Filters</h5>
                                    <div class="refine-section">



                                        <div class="refine-filters">
                                            <h6 class="refine-filter-title">Clothing Type</h6>
                                            <ul>
                                                <li>
                                                    <label class="checkbox-container">Men
                                                             <input type="checkbox" checked="checked">
                                                              <span class="checkmark"></span>
                                                             </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-container">Women
                                                 <input type="checkbox">
                                                 <span class="checkmark"></span>
                                                 </label>
                                                </li>
                                                <li>
                                                    <label class="checkbox-container">Couples
                                                    <input type="checkbox">
                                                    <span class="checkmark"></span>
                                                     </label>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="refine-filters">
                                            <h6 class="refine-filter-title">Apparel</h6>
                                            <input type="hidden" id="storeBrands" value="1" name="selectedBrands">
                                            <ul>
                                            <?php if(count($brands)>0): ?>
                                            <?php $__currentLoopData = $brands['properties']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                            <label class="checkbox-container"><?php echo e($brand['brandName']); ?>

                                            <input onclick="selectBrand(<?php echo e($brand['id']); ?>)"  id="<?php echo e($brand['id']); ?>" type="checkbox">
                                            <span class="checkmark"></span>
                                            </label>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                                            <?php endif; ?>
                                            </ul>
                                        </div>


                                    </div>

                                </div>

                                <div class="col-md-9 pricing-product-list" >

                                    <h5 class="pricing-product-title2">Products</h5>
                                    <div class="row" id="filteredproducts">
                                        <!-- Styles api products loads here-->                                        
                                    </div>
                                    <nav aria-label="Page navigation" id="pagination">
                                        <ul class="pagination justify-content-end pricing-product-pagination">
                                            <li class="page-item">
                                                <a class="page-link" href="#" tabindex="-1">Prev</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>

                                </div>


                            </div>



                        </div>

                        <div class="mt-3">
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="button" class="btn btn-primary btn-md next-step ml-2">Save and continue</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="progressbar-4" role="tabpanel" aria-labelledby="progressbar-4-tab">
                        <div>

                            <table class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Clothing </th>
                                        <th scope="col">Style </th>
                                        <th scope="col">Base Price</th>
                                        <th scope="col">Margin</th>
                                        <th scope="col">Price Retail</th>
                                        <th scope="col">Markup</th>
                                    </tr>
                                </thead>
                                <tbody id="ListingProducts" >
                                    <tr>
                                        <th><input type="checkbox" name="" id=""> </th>
                                        <td> <img src="images/images/Sample-img.jpg" width="80" height="100" class="img-fluid" alt=""> </td>
                                        <td>Regular T Short</td>
                                        <td> $12 - $15</td>
                                        <td> <span class="text-peach">$13</span></td>
                                        <td> $12 - $15</td>
                                        <td> 20%</td>
                                    </tr>
                              


                                </tbody>
                            </table>

                        </div>
                       
                        <div class="mt-3">
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="button" onclick="saveandpush()" class="btn btn-primary btn-md next-step ml-2">Save & Push</button>
                            </div>
                        </div>
                    </div>
                </div>
        
        
        
     
       
     
     
     
     </div>
     
    
     
    </div>

    
    
    </div>

    <!-- product images -->
            <div class="modal markup-modal" id="productimages" tabindex="-1" role="dialog" aria-labelledby="availabeimagesLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                        <div class="modal-body">
                            <div class="row markup-move markupimages">

                             
                               <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>


       <script type="text/javascript">

function showPricingProducts(id){
$('#pricing_'+id).show();
console.log(id);
}


                            
                            function saveandpush(){ 
                            var getUrl = window.location;    
                            var baseUrl = "<?php echo e(env('API_URL')); ?>api/artworkProduct/save";
                            var redirectUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]+'/addproducts';
                            var saveurl = baseUrl.replace('/:', ':')
                                $('input[name="Set_Pricing"]:checked').each(function() {
                               console.log(this.id);

                                var productId = $(this).attr('productId');
                                var artworkId = $(this).attr('artworkid');
                                var designedImage = $(this).attr('designedImage');
                                var createdById = <?php echo e($user); ?>;
                                var status = "Active";

                                 
                            
                            console.log(saveurl+"productid="+productId+"artworkId="+artworkId+"designedimage="+designedImage+"createdby="+createdById+"status="+status);
                            var url = saveurl;//form.attr('action');
                             
                            $.ajax({url: url, contentType: 'application/json', dataType: 'json', 
                            headers: {
                            "Authorization":"Bearer <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                        }, 
                        data: JSON.stringify({ 
                                "artWorkImage": $("input[name='artwork']:checked").val(),
                                "artworkId": artworkId,
                                "createdById": createdById,
                                "designedImage": designedImage,
                                "productId": productId, 
                                "status": status                               
                         }),
                        type: 'POST',
                         success: function(data){ 


                                    console.log(data);


                                }

                                  });


                                });

                                alert("Saved successfully");
                                window.location.href = redirectUrl;  
                            }
                  

function selectProductTab(){
    
                            var query = '{"brands": [';    
                            var stored_Brands = $('#storeBrands').val();
                            var array = stored_Brands.split(',');  
                            var i;
                            
                            for (i = 0; i < array.length; ++i) {
                            if(i == 0){
                                query = query + '{"id":'+array[i]+'}';    
                            } else {
                                query = query + ',{"id":'+array[i]+'}';
                            }
                            // do something with `substr[i]`
                            } 
                            query = query + '],"styles":[';    
                            var stored_products = $('#storeproducts').val();
                            var array = stored_products.split(',');  
                            var i;
                            
                            for (i = 0; i < array.length; ++i) {
                            if(i == 0){
                                query = query + '{"id":'+array[i]+'}';     
                            } else {
                                query = query + ',{"id":'+array[i]+'}';
                            }
                            // do something with `substr[i]`
                            } 
                            query = query + '], "pageNumber":1, "limit":30}'; 
                            console.log(query);
                            var getUrl = window.location;
                            var baseUrl = "<?php echo e(env('API_URL')); ?>api/product/getProductsByCriteria";
                            var url = baseUrl.replace('/:', ':')
                            console.log(url);
                            var url = url;//form.attr('action');
                             
                            $.ajax({url: url, contentType: 'application/json', dataType: 'json', 
                            headers: {
                            "Authorization":"Bearer <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                        }, 
                        data: query,
                        type: 'POST',
                         success: function(productsType){ 
                            
                            if(productsType.operationCode == 200){
                                var image = '';
                                var label = '';
                                var id = '';
                                if(productsType.properties.products.length > 0) {
                                //console.log(productsType.properties.products);
                                $('#filteredproducts').html("");
                                $('#ListingProducts').html("");
                                //console.log(productsType.properties.products[0][0]['id']);
                                $.each(productsType.properties.products, function (i, currProgram) {

                                id = productsType.properties.products[i].id;
                                label = productsType.properties.products[i].label;
                                image = productsType.properties.products[i].image;  

                                var image = image.split(',');

                             /*   var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[0]+':8080'+'/api/media/mergeImageWithArtWork?imageId='+image[0]+'&artWorkImageId='+$("input[name='artwork']:checked").val();*/

                              var baseUrl = "<?php echo e(env('API_URL')); ?>api/media/getById/"+image[0];


                            var url = baseUrl.replace('/:', ':')
                            var url = url;//form.attr('action');  
                            //console.log(url);          
                            $.ajax({url: url, contentType: 'application/json', dataType: 'json', headers: {
                            "Authorization":"Bearer  <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                        }, type: 'GET', success: function(imagedata){ 
                            
                            if(imagedata.operationCode == 200){ 

                                var finalImage = "";  
                                var baseUrl = "<?php echo e(env('API_URL')); ?>api/media/mergeImagePathsWithArtWork/";


                            var url = baseUrl.replace('/:', ':')
                            var url = url;//form.attr('action');  
                           // console.log(url);

                            // first product image second artwork image


                                 $.ajax({url: url, contentType: 'application/json', dataType: 'json', headers: {
                            "Authorization":"Bearer  <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                        }, data : JSON.stringify({

                                        
                                              "styleId" :  productsType.properties.products[i].styleId.id, 
                                              "fileNames": [
                                                imagedata.properties.full_url, $("input[name='artwork']:checked").val() ]
                                            }), type: 'POST', success: function(finalimagedata){ 
                            
                            if(finalimagedata.operationCode == 200){ 


                                            finalImage = finalimagedata.properties.full_url;

                                                   console.log(productsType.properties.products[i]);

                                            $('#filteredproducts').append('<div class="col-md-4"><div class="pricing-product"><label class="checkbox-container"><input id="'+productsType.properties.products[i].id+'" type="checkbox" onclick="showPricingProducts(this.id);"><span class="checkmark"></span></label><img title="'+productsType.properties.products[i].label+'" src="'+finalImage+'"  width="100%"></div></div>');

                           $('#ListingProducts').append('<tr id="pricing_'+productsType.properties.products[i].id+'" style="display:none;"><th><input type="checkbox" name="Set_Pricing" productId="'+productsType.properties.products[i].id+'" designedImage="'+finalImage+'"  artworkId="'+productsType.properties.products[i].id+'"  > </th> <td> <img src="'+finalImage+'" width="80" height="100" class="img-fluid" alt=""> </td><td>'+productsType.properties.products[i].label+'</td><td> $12 - $15</td><td> <span class="text-peach">$13</span></td><td> $12 - $15</td><td> 20%</td></tr>');

                                         }
                                }
                            });      


                                 


                        



                            }
                        }
                    });                  
                                
                                    
                                
                                
                    });
                    $('#pagination').css('display','block'); 
                    } else {
                     $('#pagination').css('display','none');   
                     $('#filteredproducts').append('<h4>No Data Available...</h4>');   
                    }
                                                    //console.log(productsType.properties.products);

                                                } 
                                            }

                                             });
                                                

}
  
        $(document).ready(function() {
           
            $('.progressbar ul li a[data-toggle="pill"]').on('show.bs.tab', function(e) {

                var $target = $(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                } else {
                    $target.parent().addClass("active");
                    $target.parent().removeClass("selected");
                    $target.parent().nextAll().removeClass("selected").removeClass("active");
                    $target.parent().prevAll().addClass("selected").removeClass("active");
                }
            });

            $(".next-step").click(function(e) {

                var $active = $('.progressbar ul li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

                /**/
            if($('#progressbar-2-tab').attr('class') == 'active show'){
                
                                    <?php if(count($styles)>0): ?>
                                        <?php $__currentLoopData = $styles['properties']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $style): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        var getUrl = window.location;
                            var baseUrl = "<?php echo e(env('API_URL')); ?>api/media/getById/<?php echo e($style['image']); ?>";
                            var url = baseUrl.replace('/:', ':')
                            var url = url;//form.attr('action');  
                            console.log(url);          
                            $.ajax({url: url, contentType: 'application/json', dataType: 'json', headers: {
                            "Authorization":"Bearer  <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                        }, type: 'GET', success: function(imagedata){ 
                            
                            if(imagedata.operationCode == 200){
                                        console.log("response came");
             var baseUrl = "<?php echo e(env('API_URL')); ?>api/media/mergeImagePathsWithArtWork/";

                            $('#style_<?php echo e($style['id']); ?>_1').val(imagedata.properties.full_url);

                            $('#style_<?php echo e($style['id']); ?>_art').attr('src',$("input[name='artwork']:checked").val());

                            var url = baseUrl.replace('/:', ':')
                            var url = url;//form.attr('action');  
                           // console.log(url);
                            $.ajax({url: url, contentType: 'application/json', dataType: 'json', headers: {
                            "Authorization":"Bearer  <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                             }, data : JSON.stringify({
                                              "styleId" :  <?php echo e($style['id']); ?> ,
                                              "fileNames": [
                                                imagedata.properties.full_url, $("input[name='artwork']:checked").val() ]
                                            }), type: 'POST', success: function(finalimagedata){ 
                            
                            if(finalimagedata.operationCode == 200){

                               $('#style_<?php echo e($style['id']); ?>').attr('src',finalimagedata.properties.full_url);

                                    }
                                }
                          
                            });

                              
                            }
                        }
                    });
                                       
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
            }    
            if($('#progressbar-3-tab').attr('class') == 'active show'){

                    selectProductTab();

            } else {
                                console.log($('#progressbar-3-tab').attr('class'));
                            }
            /**/

            });
            $(".prev-step").click(function(e) {
                /**/
            if($('#progressbar-3-tab').attr('class') == 'active show'){
            $('#filteredproducts').html('');
            }
            /**/
                var $active = $('.progressbar ul li.active');
                //$active.addClass('disabled');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            
            $(elem).next().find('a[data-toggle="pill"]').click();
            $(elem).removeClass('active');
            $(elem).addClass('selected');
            $(elem).next().addClass('active');

            

        }

        function prevTab(elem) {
            
            $(elem).prev().find('a[data-toggle="pill"]').click();
            $(elem).removeClass('active');
            $(elem).prev().addClass('active').removeClass('selected');
        }





    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>