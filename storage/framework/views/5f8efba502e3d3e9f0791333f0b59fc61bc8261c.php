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
<div class="container">

      <div class="row">
         <div class="col-md-3">
        <?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

             <div class="bg-white p-3 pt-1">
                 <h4 class="mt-4">Your Artworks</h4>

                 <div class="art-works">
                     <div class="art-works-list">
                         <ul id="artWorkProduct">
                         </ul>
                     </div>
                 </div>
             </div>

         </div>
         
         <div class="col-md-9">
           
           <div class="container p-4">
             
             <div class="container-fluid">
                 <ul class="my-account-nav">
                   <li> <a href="#">My Stores</a> <span class="icon-caret-right"></span></li>
                   <li> <a href="#">My Artworks</a></li>
                 </ul>
             </div>
           
             <div class="row bg-white mt-4 my-accont-forms p-4">
             <div class="col-md-12">
             <?php if(session()->has('message.level')): ?>
    <div class="alert alert-<?php echo e(session('message.level')); ?>">
    <?php echo session('message.content'); ?>

    </div>
<?php endif; ?>
<?php if(Session::has('saveArtWork_succ')): ?>
 <div class="alert alert-success">
        <ul>
          <p><?php echo e(Session::get('saveArtWork_succ')); ?></p>
        </ul>
 </div>
<?php endif; ?>
<?php if(Session::has('saveArtWork_img_error')): ?>
 <div class="alert alert-danger">
        <ul>
          <p><?php echo e(Session::get('saveArtWork_img_error')); ?></p>
        </ul>
 </div>
<?php endif; ?>
   <h4 class="mb-4">Artwork Details</h4>
   <form action="<?php echo e(url('saveartwork')); ?>" method="post" enctype="multipart/form-data" id="submit_artwork">
    <?php echo e(csrf_field()); ?>

    
    <div class="form-group row">
      <label for="email" class="col-sm-5 col-form-label">Artwork Name <span style="color:red">*</span></label>
      <div class="input-box col-sm-7"><input type="text" class="form-control input-bg" id="artwork_name"  name="artwork_name" required> </div>
    </div>

    <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Upload Artwork <span style="color:red">*</span>
                                      <br>
                                      <span class="text-danger text-small">Min. 400 X 400 px Max.Size 1 MB</span>
                                    </label>
                                    <div class="col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="updated_artwork" name="updated_artwork" accept="image/*" required>
                                            <input class="" type="checkbox" name="remember" required>
                                            <span>By uploading the Artwork, i confirm that i hold the copyrights for the Artwork or a license to use it.</span>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="mt-3">
                                            <img src="images/storelogo.png" id="artwork_image" width="80" height="80" class="img-fluid" alt="">
                                        </div>
                                    </div>
    </div>

    <!--<div class="form-group">
      <label for="pwd">Upload Artwork <br>
      <span class="text-danger text-small">Min. 400 x 400 px Max.Size 1 MB</span>
      </label>
      
      <div class="input-box">

       <input type="file" class="form-control" id="updated_artwork"  name="updated_artwork" required>
       

      </div>
     
        
      
    </div>-->
    <div class="form-group row">
      <label for="pwd" class="col-sm-5 col-form-label">Artwork Usage</label>
      <div class="input-box col-sm-7">
        <div class="m-check">  <input class="input-bg" type="radio" name="private_artwork" value="1" checked="checked"> <span>Private</span></div>
        <div class="m-check">  <input class="input-bg" type="radio" name="private_artwork" value="0"> <span>Public (Commercial)</span></div>        
      </div>
    </div>
    <div class="form-group row hide-when-private">
      <label for="pwd" class="col-sm-5 col-form-label">If Public, Select the Sales Channels where your Artwork can be used. <span style="color:red">*</span></label>
      <div class="input-box col-sm-7">
        <div class="m-check">  <input class="input-bg channels" type="checkbox" name="channel_individual" value="Individual Buyers (B2C)"> <span>Individual Buyers (B2C)</span></div>
        <div class="m-check">  <input class="input-bg channels" type="checkbox" name="channel_awkwardstyle" value="Awkwardstyles Marketplace Stores"> <span>Awkwardstyles Marketplace Stores</span></div>
        <div class="m-check">  <input class="input-bg channels" type="checkbox" name="channel_thirdMarketPlace" value="Thirdparty Marketplace Stores"> <span>Thirdparty Marketplace Stores</span></div>
        <div class="m-check">  <input class="input-bg channels" type="checkbox" name="channel_thirdEcommerce" value="Thirdparty Ecommerce Platforms"> <span>Thirdparty Ecommerce Platforms</span></div>        
      </div>
    </div>
     <div class="form-group row">
      <label for="pwd" class="col-sm-5 col-form-label">Artwork Description</label>
      <div class="input-box col-sm-7">   <textarea class="form-control input-bg" rows="3" id="artwork_description" name="artwork_description"></textarea> </div>
    </div>
    
     <div class="form-group row">
      <label for="pwd" class="col-sm-5 col-form-label">Artwork Category</label>
      <div class="input-box col-sm-7">
      <?php if( count($categories)>0 ): ?>
        <select class="form-control input-bg" id="artwork_category" name="artwork_category" required>
        <option>Select Category</option>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <?php endif; ?>
      </div>
    </div>
    
     <div class="form-group row">
      <label for="pwd" class="col-sm-5 col-form-label">Artwork Tags</label>
      <div class="input-box col-sm-7" id="tags">
      <div class="easy-autocomplete">
      <!--<textarea class="form-control input-bg" rows="3" id="tag-suggestions" name="artwork_tags"></textarea>-->
      <input type="text" class="form-control input-bg" id="tag-suggestions" name="artwork_tags" placeholder="Enter tag name and press comma[,]"  autocomplete="off">
      <div class="easy-autocomplete-container" id="eac-container-provider-remote"><ul style="display: none;"></ul></div></div>
      </div>
    </div>
    
     <div class="form-group row hide-when-private">
      <label for="email" class="col-sm-5 col-form-label">Suitable Audience <span style="color:red">*</span></label>
      <div class="input-box col-sm-7">
        <div class="m-check">  <input class="input-bg" type="radio" name="suitable_audience" value="G"> <span>G</span></div>
        <div class="m-check">  <input class="input-bg" type="radio" name="suitable_audience" value="PG--13"> <span>PG--13</span></div>
        <div class="m-check">  <input class="input-bg" type="radio" name="suitable_audience" value="R"> <span>R</span></div>
      </div>
    </div>
    
     <div class="form-group row hide-when-private">
      <label for="pwd" class="col-sm-5 col-form-label">Royalty Fee <span style="color:red">*</span></label>
      <div class="input-box col-sm-7">
        <input type="text" class="form-control input-bg" id="royalty_fees"  name="royalty_fees">
      </div>
    </div>
    <br/>
    <div class="form-group">
      <button type="submit" class="btn btn-primary float-right" id="submitBtn"> Save and Choose Products</button>
    </div>
   </form>
   
   </div>
   
   
             </div>
           </div>
         
         
         </div>
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
    let isPrivate = $("input[name='private_artwork']:checked").val();
    if(isPrivate==0) {
      $(".hide-when-private").show();
    } else {
      $(".hide-when-private").hide();
    }

  $("input[name='private_artwork']").change(function(){
    let isPrivate = $("input[name='private_artwork']:checked").val();
    if(isPrivate==0) {
      $(".hide-when-private").show();
    } else {
      $(".hide-when-private").hide();
    }
  });

  console.log("TOKEN:","<?php echo e($token); ?>");
  $.ajax({
      url: "<?php echo e(env('API_URL')); ?>api/artwork/getAllArtworks",
      contentType: 'application/json',
      dataType: 'json',
      headers: {
          "Authorization": "Bearer " +
            "<?php echo e($token); ?>",
          "Content-Type": "application/json"
      },
      type: 'GET',
      success: function(artworkList) {
          console.log("artwork---",artworkList);
          let url = "<?php echo e(url('/')); ?>";
          for(let i=0; i<=artworkList.properties.length;i++) {
            if(artworkList.properties) {
              let data = new Date(artworkList.properties[i].ctime)
              $('#artWorkProduct').append(`
                <li>
                  <div><img src="${artworkList.properties[i].mediaId.full_url}" width="100%" height="auto" ></div>
                  <p class="art-work-title"><a href="<?php echo e(url('addproducts')); ?>/${artworkList.properties[i].id}/${artworkList.properties[i].artName}">${artworkList.properties[i].artName}</a></p>
                  <p class="art-creation-date">${data}</p>
                </li>
              `);
            } else {
              $(".art-works-list").html(`You have not uploaded any Artwork's yet.`);
            }     
        }                                                            
      },
      error: function(error) { 
          console.log("artWorkProduct ERROR:",error.responseJSON.message); 
          $('.art-works-list').html(error.responseJSON.message);
      }
  });

});

var allTags = [];

$("form").submit(function(e){
   // e.preventDefault();

    $("#tag-suggestions").val(JSON.stringify(allTags)).hide();


    return true;
});

$(function(){

  $('#tags input').on('focusout', function(){    
    var txt= this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g,''); // allowed characters list
    if(txt) $(this).after('<span class="tag">'+ txt +'</span>');
      allTags.push(txt);
    this.value="";
    //this.focus();
  }).on('keyup',function( e ){
    // comma|enter (add more keyCodes delimited with | pipe)
    if(/(188)/.test(e.which)) $(this).focusout();
  });
  
  $('#tags').on('click','.tag',function(){
     if( confirm("Delete this tag?") ) {
         for(var i = 0; i < allTags.length; i++){
             if(allTags[i] === $(this).text()){
                 allTags.splice(i, 1);
             }
         }
         $(this).remove();
     }
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
          if(this.files[0].size > 10000000){
              if(!$("#file_err").length) {
                  $(this).after("<div class='bg-danger p-3 text-white' id='file_err'>File too large</div>");
              }

          } else {
              if($("#file_err")){
                  $("#file_err").remove();
              }
              readURL(this,'#artwork_image');
          }
        });
/* Image preview on select end*/              
</script>            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>