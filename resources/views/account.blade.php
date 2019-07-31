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
             <form id="userform" method="POST">
         <div class="row bg-white p-3">
             {{ csrf_field() }}
                    <h3 class="mb-3">Personal Details <span class="icon-check-circle"></span></h3>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="inputEmail4">First Name</label>
                                <input type="text" class="form-control input-bg" id="firstname" value="@if(isset($user_details->firstname)){{ $user_details->firstname }} @endif" name="firstname" placeholder="firstname">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Last Name</label>
                                <input type="text" class="form-control input-bg" value="@if(isset($user_details->lastname)){{ $user_details->lastname }} @endif" name="lastname" id="lastname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Business Name ( If applicable )</label>
                                <input type="text" class="form-control input-bg" id="businessname" name="businessname" value="@if(isset($user_details->business_name)){{ $user_details->business_name }} @endif" placeholder="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control input-bg" id="email" name="email" value="@if(isset($user_details->email)) {{ $user_details->email }} @endif" placeholder="Test@gmail.com">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">City</label>
                                <input type="Text" class="form-control input-bg" value="@if(isset($user_details->city)) {{ $user_details->city }} @endif" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">Country</label>
                                <input type="Text" class="form-control input-bg" value="@if(isset($user_details->country)){{ $user_details->country }} @endif" id="country" name="country" placeholder="Country">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="inputEmail4">About you <span class="text-danger text-small">Min. 200 Characters</span></label>
                                <textarea class="form-control input-bg" id="about_you" name="about_you" rows="2" maxlength="200">@if(isset($user_details->about_you)){{ $user_details->about_you }} @endif</textarea>
                            </div>




                        </div>

                </div>



                <div class="row mt-3 bg-white p-3">
                    <h3 class="mb-3">Social Media Handles</h3>

                        <div class="form-row">

                            <div class="form-group col-md-4 social-fb">
                                <label for="inputEmail4">facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook" value="@if(isset($user_details->facebook)){{ $user_details->facebook }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-ins">
                                <label for="inputEmail4">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" value="@if(isset($user_details->instagram)){{ $user_details->instagram }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-twi">
                                <label for="inputEmail4">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter" value="@if(isset($user_details->twitter)){{ $user_details->twitter }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-pin">
                                <label for="inputEmail4">Pinterest</label>
                                <input type="text" class="form-control" id="pinterest" name="pinterest" value="@if(isset($user_details->pinterest)){{ $user_details->pinterest }} @endif" placeholder="">
                            </div>

                            <div class="form-group col-md-4 social-pin">
                                <label for="inputEmail4">Youtube</label>
                                <input type="text" class="form-control" id="youtube" name="youtube" value="@if(isset($user_details->youtube)){{ $user_details->youtube }} @endif" placeholder="">
                            </div>

                        </div>
                    




                </div>


                <div class="row p-2 bg-white mt-3">

                    <div class="col-md-12">

                        <div class="float-right">
                            <span id="message"></span>
                            <button type="button" class="btn btn-secondary btn-md width-150 cancel-1">Cancel</button>
                            <button type="submit" id="submit_button" class="btn btn-primary btn-md width-150 save-changes">Save Changes</button>
                        </div>


                    </div>



                </div>
                </form>
         </div>

        
  </div>
</div>
<script>
$("#about_you").keyup(function(){
  console.log('yes');
  if($(this).val().length < 200){
    $(this).css("border-color","red");
  }
});
</script>     
@endsection
