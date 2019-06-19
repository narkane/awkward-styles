

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
input:invalid {
    border: 1px solid #FF0000;
}
</style>
<div class="container">
    
      <div class="row">
         <div class="col-md-3">
        <?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     
     </div>
         
         <div class="col-md-9">
         <div class="row bg-white p-3">
                    <h3 class="mb-3">Personal Details <span class="icon-check-circle"></span></h3>

                    <form id="userform">
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control input-bg" id="firstname" value="<?php if(isset($user_details['properties']['firstName'])): ?><?php echo e($user_details['properties']['firstName']); ?> <?php endif; ?>" name="firstname" placeholder="firstname">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control input-bg" value="<?php if(isset($user_details['properties']['lastName'])): ?><?php echo e($user_details['properties']['lastName']); ?> <?php endif; ?>" name="lastname" id="lastname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Business Name ( If applicable )</label>
                                <input type="text" class="form-control input-bg" id="businessname" name="businessname" value="<?php if(isset($user_details['properties']['business_name'])): ?><?php echo e($user_details['properties']['business_name']); ?> <?php endif; ?>" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control input-bg" id="email" name="email" value="<?php if(isset($user_details['properties']['email'])): ?> <?php echo e($user_details['properties']['email']); ?> <?php endif; ?>" placeholder="Test@gmail.com">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">City</label>
                                <input type="Text" class="form-control input-bg" value="<?php if(isset($user_details['properties']['city'])): ?> <?php echo e($user_details['properties']['city']); ?> <?php endif; ?>" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Country</label>
                                <input type="Text" class="form-control input-bg" value="<?php if(isset($user_details['properties']['country'])): ?><?php echo e($user_details['properties']['country']); ?> <?php endif; ?>" id="country" name="country" placeholder="Country">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">About you <span class="text-danger text-small">Min. 200 Characters</span></label>
                                <textarea class="form-control input-bg" id="about_you" rows="2" maxlength="200"><?php if(isset($user_details['properties']['aboutYou'])): ?><?php echo e($user_details['properties']['aboutYou']); ?> <?php endif; ?></textarea>
                            </div>




                        </div>
                    </form>

                </div>



                <div class="row mt-3 bg-white p-3">
                    <h3 class="mb-3">Social Media Handles</h3>



                    <form>
                        <div class="form-row">

                            <div class="form-group col-md-4 social-fb">
                                <label for="inputEmail4">facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="<?php if(isset($user_details['properties']['facebook'])): ?><?php echo e($user_details['properties']['facebook']); ?> <?php endif; ?>" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-ins">
                                <label for="inputEmail4">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="<?php if(isset($user_details['properties']['instagram'])): ?><?php echo e($user_details['properties']['instagram']); ?> <?php endif; ?>" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-twi">
                                <label for="inputEmail4">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="<?php if(isset($user_details['properties']['twitter'])): ?><?php echo e($user_details['properties']['twitter']); ?> <?php endif; ?>" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-pin">
                                <label for="inputEmail4">Pinterest</label>
                                <input type="text" class="form-control" id="pinterest" name="pinterest" value="<?php if(isset($user_details['properties']['pinterest'])): ?><?php echo e($user_details['properties']['pinterest']); ?> <?php endif; ?>" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-pin">
                                <label for="inputEmail4">Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="<?php if(isset($user_details['properties']['youtube'])): ?><?php echo e($user_details['properties']['youtube']); ?> <?php endif; ?>" placeholder="">
                            </div>

                        </div>
                    




                </div>


                <div class="row p-2 bg-white mt-3">

                    <div class="col-md-12">

                        <div class="float-right">
                            <span id="message"></span>
                            <button type="button" class="btn btn-secondary btn-md width-150 cancel-1">Cancel</button>
                            <button type="button" id="submit_button" class="btn btn-primary btn-md width-150 save-changes">Save Changes</button>
                        </div>


                    </div>



                </div>
                </form>
         </div>

        
  </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script>
$("#submit_button").click(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    $('#message').html('Processing...');
    var firstName = $('#firstname').val()?$('#firstname').val():'';
    var lastName = $('#lastname').val()?$('#lastname').val():'';
    var name = firstname + " " + lastName;
    var businessName = $('#businessname').val()?$('#businessname').val():'';
    var email = $('#email').val()?$('#email').val():'';
    var city = $('#city').val()?$('#city').val():'';
    var country = $('#country').val()?$('#country').val():'';
    var about_you = $('#about_you').val()?$('#about_you').val():'';
    var facebook = $('#facebook').val()?$('#facebook').val():'';
    var instagram = $('#instagram').val()?$('#instagram').val():'';
    var twitter = $('#twitter').val()?$('#twitter').val():'';
    var pinterest = $('#pinterest').val()?$('#pinterest').val():'';
    var youtube = $('#youtube').val()?$('#youtube').val():'';

    if(firstName=='' || lastName=='' || email=='' || city=='' || country=='' || about_you=='' || about_you.length < 200) {

      $('#message').html('Please fill required fields...');
      $('#firstname').css({"border":"1px solid red"});
      $('#lastname').css({"border":"1px solid red"});
      $('#city').css({"border":"1px solid red"});
      $('#country').css({"border":"1px solid red"});
      $('#email').css({"border":"1px solid red"});
      $('#about_you').css({"border":"1px solid red"});


      
    } else {

    var getUrl = window.location;
    var baseUrl = "<?php echo e(env('API_URL')); ?>api/users/update";
    var form = $(this);
    var url = baseUrl.replace('/:', ':')
    var url = url;//form.attr('action');
    console.log(url);
    $.ajax({
           type: "POST",
           url: url,
           data: JSON.stringify({
            
        "id": <?php if(isset($user_details['properties']['id'])): ?><?php echo e($user_details['properties']['id']); ?> <?php endif; ?>,
        "userName": "<?php if(isset($user_details['properties']['userName'])): ?><?php echo e($user_details['properties']['userName']); ?> <?php endif; ?>",
        "email": email,
        "password": "<?php if(isset($user_details['properties']['password'])): ?><?php echo e($user_details['properties']['password']); ?> <?php endif; ?>",
        "mtime": "<?php if(isset($user_details['properties']['mtime'])): ?><?php echo e($user_details['properties']['mtime']); ?> <?php endif; ?>",
        "ctime": "<?php if(isset($user_details['properties']['ctime'])): ?><?php echo e($user_details['properties']['ctime']); ?> <?php endif; ?>",
        "isSuperUser": <?php if(isset($user_details['properties']['isSuperUser'])): ?><?php echo e($user_details['properties']['isSuperUser']); ?> <?php endif; ?>,
        "label": "<?php if(isset($user_details['properties']['label'])): ?><?php echo e($user_details['properties']['label']); ?> <?php endif; ?>",
        "salutation": "<?php if(isset($user_details['properties']['salutation'])): ?><?php echo e($user_details['properties']['salutation']); ?> <?php endif; ?>",
        "company": "<?php if(isset($user_details['properties']['company'])): ?><?php echo e($user_details['properties']['company']); ?> <?php endif; ?>",
        "vatid": "<?php if(isset($user_details['properties']['vatid'])): ?><?php echo e($user_details['properties']['vatid']); ?> <?php endif; ?>",
        "title": "<?php if(isset($user_details['properties']['title'])): ?><?php echo e($user_details['properties']['title']); ?> <?php endif; ?>",
        "firstName": firstName,
        "lastName": lastName,
        "name": name,
        "business_name":businessName,
        "address1": "<?php if(isset($user_details['properties']['address1'])): ?><?php echo e($user_details['properties']['address1']); ?> <?php endif; ?>",
        "address2": "<?php if(isset($user_details['properties']['address2'])): ?><?php echo e($user_details['properties']['address2']); ?> <?php endif; ?>",
        "address3": "<?php if(isset($user_details['properties']['address3'])): ?><?php echo e($user_details['properties']['address3']); ?> <?php endif; ?>",
        "postal": "<?php if(isset($user_details['properties']['postal'])): ?><?php echo e($user_details['properties']['postal']); ?> <?php endif; ?>",
        "city": city,
        "country": country,
        "state": "<?php if(isset($user_details['properties']['state'])): ?><?php echo e($user_details['properties']['state']); ?> <?php endif; ?>",
        "telephone": "<?php if(isset($user_details['properties']['telephone'])): ?><?php echo e($user_details['properties']['telephone']); ?> <?php endif; ?>",
        "telefax": "<?php if(isset($user_details['properties']['telefax'])): ?><?php echo e($user_details['properties']['telefax']); ?> <?php endif; ?>",
        "website": "<?php if(isset($user_details['properties']['website'])): ?><?php echo e($user_details['properties']['website']); ?> <?php endif; ?>",
        "status": <?php if(isset($user_details['properties']['status'])): ?><?php echo e($user_details['properties']['status']); ?> <?php endif; ?>,
        "editor": "<?php if(isset($user_details['properties']['editor'])): ?><?php echo e($user_details['properties']['editor']); ?> <?php endif; ?>",
        "aboutYou": about_you,
        "facebook": facebook,
        "instagram": instagram,
        "twitter": twitter,
        "pinterest": pinterest,
        "youtube": youtube
    
  //form.serialize(), // serializes the form's elements.
}),
           contentType: 'application/json', 
           dataType: 'json', 
           headers: {
                            "Authorization":"Bearer  <?php echo e($token); ?>",
                            "Content-Type":"application/json"
                    },
           success: function(data)
           { 
               if(data.operationCode == 200) {
                  $('#message').html('Details updated...');     
               } else {
                  $('#message').html('Please try again...');
               }
           }
         });
       }


});    
$("#about_you").keyup(function(){
  console.log('yes');
  if($(this).val().length < 200){
    $(this).css("border-color","red");
  }
});
</script>     
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>