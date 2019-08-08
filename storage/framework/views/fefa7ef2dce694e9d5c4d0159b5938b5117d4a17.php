<?php $__env->startSection('content'); ?>
<style>
    #tags{
    }
    #tags span.tag{
    cursor:pointer;
    display:block;
    float:left;
    color:#555;
    background:#f4f0f7;
    padding:5px 10px;
    padding-right:30px;
    margin:4px;
    }
    #tags span.tag:hover{
    opacity:0.7;
    }
    #tags span.tag:after{
    position:absolute;
    content:"×";
    border:1px solid;
    border-radius:10px;
    padding:0 4px;
    margin:3px 0 10px 7px;
    font-size:10px;
    }
</style>
<?php //print_r($orderTracking); die;?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
        </div>
        <div class="col-md-9">
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="my-account-nav">
                            <li> <a href="#">My Stores</a> <span class="icon-caret-right"></span></li>
                            <li> <a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row bg-white mt-4 my-accont-forms p-4">         
                    <div class="container">
                    <h2>Striped Rows</h2>          
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Order#</th>
                          <th>Product NameQty</th>
                          <th>Qty</th>
                          <th>Status</th>
                          <th>Sales Channel</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                       <?php $__currentLoopData = $orderTracking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                          <?php $__currentLoopData = $val['elements']['order']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             
                              <tr>
                              <td><?php echo e(@$orderValue['purchaseOrderId']); ?></td>
                              <td><?php echo e(@$orderValue['orderLines']['orderLine'][0]['item']['productName']); ?></td>
                              <td><?php echo e(@$orderValue['orderLines']['orderLine'][0]['orderLineQuantity']['unitOfMeasurement']); ?></td>
                              <td><?php echo e(@$orderValue['orderLines']['orderLine'][0]['orderLineStatuses']['orderLineStatus'][0]['status']); ?></td>
                              <td><?php echo e(@$orderValue['orderLines']['orderLine'][0]['charges']['charge'][1]['chargeType']); ?></td>
                             
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3 bg-white">
            <h4 class="mt-4">Your Artworks</h4>
        </div> -->
    </div>
</div>
<script>
$(document).ready(function() {
                  var options1 = {
                    url: function(phrase) {
                      return "<?php echo e(url('tagsuggestions/')); ?>/"+phrase;
                    },
                    getValue: "tag"
                  };

                  $("#tag-suggestions").easyAutocomplete(options1);

});

$(function(){

  $('#tags input').on('focusout', function(){    
    var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g,''); // allowed characters list
    if(txt) $(this).after('<span class="tag">'+ txt +'</span>');
    this.value="";
    //this.focus();
  }).on('keyup',function( e ){
    // comma|enter (add more keyCodes delimited with | pipe)
    if(/(188)/.test(e.which)) $(this).focusout();
  });
  
  $('#tags').on('click','.tag',function(){
     if( confirm("Delete this tag?") ) $(this).remove(); 
  });

});

/* Image preview on select start*/
function readURL(input,v) {
   if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(v).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
      $("#updated_artwork").change(function(){
        readURL(this,'#artwork_image');
        });
/* Image preview on select end*/              
</script>            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>