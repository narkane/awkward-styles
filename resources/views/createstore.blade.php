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

</style>
<div class="container">
    
      <div class="row">
         <div class="col-md-3">
         @include('menu')    
         </div>
         
         <div class="col-md-9">
           
           <div class="container p-4">
             
             <div class="row">
                        <div class="col-md-12 pl-0">
                            <h2>My Stores</h2>
                        </div>
             </div>

             <div class="row">
                        <div class="col-md-6 pl-0 mt-3">
                            <div class="store-fronts p-4">
                                <p class="store-title">Storefronts</p>
                                <div class="store-fronts-list">
                                  @isset($storefronts)
@if(count($storefronts)>0)
                                  @foreach($storefronts as $storefront)
                                  <a href="{{url('artiststorefront/'.$storefront->id)}}">{{ $storefront->name }}  <span class="icon-edit1"></span></a>
                                  @endforeach
                                  @else
                                  @endif
@endisset
                                </div>
                                <p class="add-store mt-2">
                                    <a href="#"> <span class="icon-plus-circle"></span>Create Storefront</a>
                                </p>
                            </div>
                        </div>


                        <div class="col-md-6 pr-0 mt-3">
                            <div class="store-fronts p-4 background-blue">
                                <p class="store-title">Marketplace Stores</p>
                                <div class="store-fronts-list">
                                    <a href="#">My Amazon Store<span class="icon-edit1"></span></a>
                                    <a href="#">My eBay Store  <span class="icon-edit1"></span></a>
                                    <a href="#">Green Store  <span class="icon-edit1"></span></a>
                                    <a href="#">Green Store  <span class="icon-edit1"></span></a>
                                </div>
                                <p class="add-store mt-2">
                                    <a href="#"> <span class="icon-plus-circle"></span>Create Marketplace Store</a>
                                </p>
                            </div>
                        </div>


                    </div>
           
             <div class="row  mt-4 my-accont-forms ">
                        <div class="col-md-8 bg-white p-4">

                            <h4 class="mb-4">Create Storefront</h4>
                            @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
    {!! session('message.content') !!}
    </div>
@endif
                            <form action="{{ url('savestore') }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="email" class="col-sm-5 col-form-label">Store Name</label>
                                    <div class="col-sm-7"><input type="text" class="form-control input-bg" id="store_name" name="store_name" required> </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwd" class="col-sm-5 col-form-label">Store Description <br>
    <span class="text-danger text-small">Min. 200 Characters</span>
    </label>

                                    <div class="col-sm-7">

                                        <textarea class="form-control input-bg" rows="3" id="store_description" name="store_description"></textarea>


                                    </div>



                                </div>

                                <div class="form-group row">
                                    <label for="pwd" class="col-sm-5 col-form-label">Store URL</label>
                                    <div class="col-sm-7"> <input type="text" class="form-control input-bg" id="store_url" name="store_url"> </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tags" class="col-sm-5 col-form-label">Tags</label>
                                    <div class="input-box col-sm-7" id="tags">
                                    <div class="easy-autocomplete">
                                    <input type="text" class="form-control input-bg" id="tag-suggestions" name="store_tags" placeholder="Enter tag name and press comma[,]"  autocomplete="off">
                                    <div class="easy-autocomplete-container" id="eac-container-provider-remote"><ul style="display: none;"></ul></div></div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Upload Logo/Photo
                                      <br>
                                      <span class="text-danger text-small">Min. 400 X 400 px Max.Size 2 MB</span>
                                    </label>
                                    <div class="col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="store_logo" name="store_logo" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="mt-3">
                                            <img src="images/storelogo.png" id="store_logo_image" width="80" height="80" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Store Baner Image
                                      <br>
                                      <span class="text-danger text-small">Min. 1400 X 400 px Max.Size 2 MB</span>
                                    </label>
                                    <div class="col-sm-7">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="store_banner" name="store_banner" required>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="mt-3">
                                            <img src="images/storebg.png" id="store_banner_image" width="150" height="150" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary float-right btn-tupe-2">Save</button>
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
                      return "{{ url('tagsuggestions/') }}/"+phrase;
                    },
                    getValue: "tag"
                  };

                  $("#tag-suggestions").easyAutocomplete(options1);

});

function readURL(input,v) {
   if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(v).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }
      $("#store_logo").change(function(){
        readURL(this,'#store_logo_image');
        });
      $("#store_banner").change(function(){
        readURL(this,'#store_banner_image');
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
</script>
@endsection
