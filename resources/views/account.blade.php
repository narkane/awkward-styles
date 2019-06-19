@extends('layouts.dashboard')

@section('content')

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
        @include('menu')
     
     </div>
         
         <div class="col-md-9">
         <div class="row bg-white p-3">
                    <h3 class="mb-3">Personal Details <span class="icon-check-circle"></span></h3>

                    <form id="userform">
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control input-bg" id="firstname" value="@if(isset($user_details['properties']['firstName'])){{ $user_details['properties']['firstName'] }} @endif" name="firstname" placeholder="firstname">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control input-bg" value="@if(isset($user_details['properties']['lastName'])){{ $user_details['properties']['lastName'] }} @endif" name="lastname" id="lastname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Business Name ( If applicable )</label>
                                <input type="text" class="form-control input-bg" id="businessname" name="businessname" value="@if(isset($user_details['properties']['business_name'])){{ $user_details['properties']['business_name'] }} @endif" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control input-bg" id="email" name="email" value="@if(isset($user_details['properties']['email'])) {{ $user_details['properties']['email'] }} @endif" placeholder="Test@gmail.com">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">City</label>
                                <input type="Text" class="form-control input-bg" value="@if(isset($user_details['properties']['city'])) {{ $user_details['properties']['city'] }} @endif" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Country</label>
                                <input type="Text" class="form-control input-bg" value="@if(isset($user_details['properties']['country'])){{ $user_details['properties']['country'] }} @endif" id="country" name="country" placeholder="Country">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">About you <span class="text-danger text-small">Min. 200 Characters</span></label>
                                <textarea class="form-control input-bg" id="about_you" rows="2" maxlength="200">@if(isset($user_details['properties']['aboutYou'])){{ $user_details['properties']['aboutYou'] }} @endif</textarea>
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
                                <input type="text" class="form-control" id="facebook" name="facebook" value="@if(isset($user_details['properties']['facebook'])){{ $user_details['properties']['facebook'] }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-ins">
                                <label for="inputEmail4">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="@if(isset($user_details['properties']['instagram'])){{ $user_details['properties']['instagram'] }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-twi">
                                <label for="inputEmail4">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="@if(isset($user_details['properties']['twitter'])){{ $user_details['properties']['twitter'] }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-pin">
                                <label for="inputEmail4">Pinterest</label>
                                <input type="text" class="form-control" id="pinterest" name="pinterest" value="@if(isset($user_details['properties']['pinterest'])){{ $user_details['properties']['pinterest'] }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-pin">
                                <label for="inputEmail4">Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="@if(isset($user_details['properties']['youtube'])){{ $user_details['properties']['youtube'] }} @endif" placeholder="">
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
    var baseUrl = "{{env('API_URL')}}api/users/update";
    var form = $(this);
    var url = baseUrl.replace('/:', ':')
    var url = url;//form.attr('action');
    console.log(url);
    $.ajax({
           type: "POST",
           url: url,
           data: JSON.stringify({
            
        "id": @if(isset($user_details['properties']['id'])){{ $user_details['properties']['id'] }} @endif,
        "userName": "@if(isset($user_details['properties']['userName'])){{ $user_details['properties']['userName'] }} @endif",
        "email": email,
        "password": "@if(isset($user_details['properties']['password'])){{ $user_details['properties']['password'] }} @endif",
        "mtime": "@if(isset($user_details['properties']['mtime'])){{ $user_details['properties']['mtime'] }} @endif",
        "ctime": "@if(isset($user_details['properties']['ctime'])){{ $user_details['properties']['ctime'] }} @endif",
        "isSuperUser": @if(isset($user_details['properties']['isSuperUser'])){{ $user_details['properties']['isSuperUser'] }} @endif,
        "label": "@if(isset($user_details['properties']['label'])){{ $user_details['properties']['label'] }} @endif",
        "salutation": "@if(isset($user_details['properties']['salutation'])){{ $user_details['properties']['salutation'] }} @endif",
        "company": "@if(isset($user_details['properties']['company'])){{ $user_details['properties']['company'] }} @endif",
        "vatid": "@if(isset($user_details['properties']['vatid'])){{ $user_details['properties']['vatid'] }} @endif",
        "title": "@if(isset($user_details['properties']['title'])){{ $user_details['properties']['title'] }} @endif",
        "firstName": firstName,
        "lastName": lastName,
        "name": name,
        "business_name":businessName,
        "address1": "@if(isset($user_details['properties']['address1'])){{ $user_details['properties']['address1'] }} @endif",
        "address2": "@if(isset($user_details['properties']['address2'])){{ $user_details['properties']['address2'] }} @endif",
        "address3": "@if(isset($user_details['properties']['address3'])){{ $user_details['properties']['address3'] }} @endif",
        "postal": "@if(isset($user_details['properties']['postal'])){{ $user_details['properties']['postal'] }} @endif",
        "city": city,
        "country": country,
        "state": "@if(isset($user_details['properties']['state'])){{ $user_details['properties']['state'] }} @endif",
        "telephone": "@if(isset($user_details['properties']['telephone'])){{ $user_details['properties']['telephone'] }} @endif",
        "telefax": "@if(isset($user_details['properties']['telefax'])){{ $user_details['properties']['telefax'] }} @endif",
        "website": "@if(isset($user_details['properties']['website'])){{ $user_details['properties']['website'] }} @endif",
        "status": @if(isset($user_details['properties']['status'])){{ $user_details['properties']['status'] }} @endif,
        "editor": "@if(isset($user_details['properties']['editor'])){{ $user_details['properties']['editor'] }} @endif",
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
                            "Authorization":"Bearer  {{ $token }}",
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
@endsection
