@extends('layouts.dashboard')

@section('content')

    <style>
        #tags {

        }

        #tags span.tag {
            cursor: pointer;
            display: block;
            float: left;
            color: #555;
            background: #f4f0f7;
            padding: 5px 10px;
            padding-right: 30px;
            margin: 4px;
        }

        #tags span.tag:hover {
            opacity: 0.7;
        }

        #tags span.tag:after {
            position: absolute;
            content: "×";
            border: 1px solid;
            border-radius: 10px;
            padding: 0 4px;
            margin: 3px 0 10px 7px;
            font-size: 10px;
        }

    </style>
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                @include('menu');

                <div class="bg-white p-3 pt-1">
                    <h4 class="mt-4">Your Artworks</h4>

                    <div class="art-works">
                            <ul id="artWorkProduct" class="list-group">
                                @foreach($artworks as $artwork)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="{{ $artwork->artwork }}" style="max-width: 75px; max-height: 75px; float:right;"/>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="pb-3">
                                                    <h5 class="d-inline">Name:</h5>
                                                        <span class="float-right">
                                                        <i class="fa fa-edit btn btn-secondary p-1"></i>
                                                        <i class="fa fa-trash-alt btn btn-secondary p-1"></i>
                                                        </span>
                                                </div>
                                                <span class="text-uppercase">{{ $artwork->artname }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-9">

                <div class="container p-4">

                    <div class="container-fluid">
                        <ul class="my-account-nav">
                            <li><a href="#">My Stores</a> <span class="icon-caret-right"></span></li>
                            <li><a href="#">My Artworks</a></li>
                        </ul>
                    </div>

                    <div class="row bg-white mt-4 my-accont-forms p-4">
                        <div class="col-md-12">
                            @if(session()->has('message.level'))
                                <div class="alert alert-{{ session('message.level') }}">
                                    {!! session('message.content') !!}
                                </div>
                            @endif
                            @if(Session::has('saveArtWork_succ'))
                                <div class="alert alert-success">
                                    <ul>
                                        <p>{{Session::get('saveArtWork_succ')}}</p>
                                    </ul>
                                </div>
                            @endif
                            @if(Session::has('saveArtWork_img_error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <p>{{Session::get('saveArtWork_img_error')}}</p>
                                    </ul>
                                </div>
                            @endif
                            <h4 class="mb-4">Artwork Details</h4>
                            <form action="{{ url('saveartwork') }}" method="post" enctype="multipart/form-data"
                                  id="submit_artwork">

                                {{ csrf_field() }}

                                @if(isset($id)) <input type="hidden" name="art_id" id="art_id" value="{{$id}}"/> @endif
                                <div class="form-group row">
                                    <label for="email" class="col-sm-5 col-form-label">Artwork Name <span
                                                style="color:red">*</span></label>
                                    <div class="input-box col-sm-7">
                                        <input type="text" class="form-control input-bg"
                                               id="artwork_name" name="artwork_name"
                                               @if(isset($id)) value="{{$current_artwork->artname}}" @endif
                                                                           required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-5 col-form-label">Upload Artwork <span
                                                style="color:red">*</span>
                                        <br>
                                        <span class="text-danger text-small">Min. 400 X 400 px Max.Size 1 MB</span>
                                    </label>
                                    <div class="col-sm-7">
                                        <div class="custom-file" @if(isset($id)) style="display:none" @endif>
                                            <input type="file" class="custom-file-input" id="updated_artwork"
                                                   name="updated_artwork" accept="image/*"
                                                   @if(isset($id)) disabled="true" @else required @endif>
                                            <input class="" type="checkbox" name="remember" required>
                                            <span>By uploading the Artwork, i confirm that i hold the copyrights for the Artwork or a license to use it.</span>
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <div class="mt-3">
                                            <img @if(isset($id)) src="{{ $current_artwork->artwork }}" @else src="images/blank.jpg" @endif id="artwork_image" width="80" height="80"
                                                 class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pwd" class="col-sm-5 col-form-label">Artwork Usage</label>
                                    <div class="input-box col-sm-7">
                                        <div class="m-check">
                                            <input class="input-bg" type="radio" name="private_artwork"
                                                   value="1" @if(isset($id) && $current_artwork->is_private == 0) checked="checked" @endif> <span>Private</span>
                                        </div>
                                        <div class="m-check">
                                            <input class="input-bg" type="radio" name="private_artwork"
                                                   value="0" @if(isset($id) && $current_artwork->is_private == 1) checked="checked" @endif> <span>Public (Commercial)</span></div>
                                    </div>
                                </div>
                                <div class="form-group row hide-when-private">
                                    <label for="pwd" class="col-sm-5 col-form-label">If Public, Select the Sales
                                        Channels where your Artwork can be used. <span
                                                style="color:red">*</span></label>
                                    <div class="input-box col-sm-7">
                                        <div class="m-check">
                                            <input class="input-bg channels" type="checkbox"
                                                   name="channel_individual"
                                                   value="Individual Buyers (B2C)"
                                                   @if(isset($id) && $current_artwork->is_individual == 1) checked="checked" @endif> <span>Individual Buyers (B2C)</span>
                                        </div>
                                        <div class="m-check">
                                            <input class="input-bg channels" type="checkbox"
                                                   name="channel_awkwardstyle"
                                                   value="Awkwardstyles Marketplace Stores"
                                                   @if(isset($id) && $current_artwork->is_awkwardstyle) checked="checked" @endif> <span>Awkwardstyles Marketplace Stores</span>
                                        </div>
                                        <div class="m-check">
                                            <input class="input-bg channels" type="checkbox"
                                                   name="channel_thirdMarketPlace"
                                                   value="Thirdparty Marketplace Stores"
                                                   @if(isset($id) && $current_artwork->is_thirdparty_marketplace) checked="checked" @endif> <span>Thirdparty Marketplace Stores</span>
                                        </div>
                                        <div class="m-check">
                                            <input class="input-bg channels" type="checkbox"
                                                   name="channel_thirdEcommerce"
                                                   value="Thirdparty Ecommerce Platforms"
                                                   @if(isset($id) && $current_artwork->is_thirdparty_ecommerce) checked="checked" @endif> <span>Thirdparty Ecommerce Platforms</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwd" class="col-sm-5 col-form-label">Artwork Description</label>
                                    <div class="input-box col-sm-7">
                                        <textarea class="form-control input-bg" rows="3"
                                                  id="artwork_description"
                                                  name="artwork_description">@if(isset($id)){{ $current_artwork->description }}@endif</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pwd" class="col-sm-5 col-form-label">Artwork Category</label>
                                    <div class="input-box col-sm-7">
                                        @if( count($categories)>0 )
                                            <select class="form-control input-bg" id="artwork_category"
                                                    name="artwork_category" autocomplete="off" required>
                                                <option>Select Category</option>
                                                @foreach( $categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if(isset($id) && $current_artwork->artwork_category_id == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pwd" class="col-sm-5 col-form-label">Artwork Tags</label>
                                    <div class="input-box col-sm-7" id="tags">
                                        <div class="easy-autocomplete">
                                            <!--<textarea class="form-control input-bg" rows="3" id="tag-suggestions" name="artwork_tags"></textarea>-->
                                            <input type="text" class="form-control input-bg" id="tag-suggestions"
                                                   name="artwork_tags" placeholder="Enter tag name and press comma[,]"
                                                   autocomplete="off">
                                            @if(isset($id))
                                                @foreach(json_decode($current_artwork->tag_name) as $tag)
                                                    <span class="tag">{{ $tag }}</span>
                                                @endforeach
                                            @endif
                                            <div class="easy-autocomplete-container" id="eac-container-provider-remote">
                                                <ul style="display: none;">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row hide-when-private">
                                    <label for="email" class="col-sm-5 col-form-label">Suitable Audience <span
                                                style="color:red">*</span></label>
                                    <div class="input-box col-sm-7">
                                        <div class="m-check">
                                            <input class="input-bg" type="radio"
                                                   name="suitable_audience" value="G"
                                            @if(isset($id) && $current_artwork->suitable_audience == "G") checked="checked" @endif> <span>G</span>
                                        </div>
                                        <div class="m-check">
                                            <input class="input-bg" type="radio"
                                                 name="suitable_audience" value="PG--13"
                                                   @if(isset($id) && $current_artwork->suitable_audience == "PG--13") checked="checked" @endif>
                                            <span>PG--13</span>
                                        </div>
                                        <div class="m-check">
                                            <input class="input-bg" type="radio"
                                                 name="suitable_audience" value="R"
                                                   @if(isset($id) && $current_artwork->suitable_audience == "R") checked="checked" @endif> <span>R</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row hide-when-private">
                                    <label for="pwd" class="col-sm-5 col-form-label">Royalty Fee <span
                                                style="color:red">*</span></label>
                                    <div class="input-box col-sm-7">
                                        <input type="text" class="form-control input-bg" id="royalty_fees"
                                               name="royalty_fees">
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary float-right" id="submitBtn" value="Save and Choose Products" />
                                </div>
                            </form>

                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var options1 = {
                url: function (phrase) {
                    return "{{ url('tagsuggestions/') }}/" + phrase;
                },
                getValue: "tag"
            };

            //$("#tag-suggestions").easyAutocomplete(options1);

            let isPrivate = $("input[name='private_artwork']:checked").val();
            if (isPrivate == 0) {
                $(".hide-when-private").show();
            } else {
                $(".hide-when-private").hide();
            }

            $("input[name='private_artwork']").change(function () {
                let isPrivate = $("input[name='private_artwork']:checked").val();
                if (isPrivate == 0) {
                    $(".hide-when-private").show();
                } else {
                    $(".hide-when-private").hide();
                }
            });

            /*
            console.log("TOKEN:", "{{$token}}");
            $.ajax({
                url: "{{env('API_URL')}}api/artwork/getAllArtworks",
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    "Authorization": "Bearer " +
                        "{{$token}}",
                    "Content-Type": "application/json"
                },
                type: 'GET',
                success: function (artworkList) {
                    console.log("artwork---", artworkList);
                    let url = "{{url('/')}}";
                    for (let i = 0; i <= artworkList.properties.length; i++) {
                        if (artworkList.properties) {
                            let data = new Date(artworkList.properties[i].ctime)
                            $('#artWorkProduct').append(`
                <li>
                  <div><img src="${artworkList.properties[i].mediaId.full_url}" width="100%" height="auto" ></div>
                  <p class="art-work-title"><a href="{{ url('addproducts')}}/${artworkList.properties[i].id}/${artworkList.properties[i].artName}">${artworkList.properties[i].artName}</a></p>
                  <p class="art-creation-date">${data}</p>
                </li>
              `);
                        } else {
                            $(".art-works-list").html(`You have not uploaded any Artwork's yet.`);
                        }
                    }
                },
                error: function (error) {
                    console.log("artWorkProduct ERROR:", error.responseJSON.message);
                    $('.art-works-list').html(error.responseJSON.message);
                }
            });
            */

        });

        var allTags = @if(isset($id)) {!! $current_artwork->tag_name  !!}; @else []; @endif;

        $(function () {

            $('#tags input').on('focusout', function () {
                var txt = this.value.replace(/[^a-zA-Z0-9\+\-\.\#]/g, ''); // allowed characters list
                if (txt) $(this).after('<span class="tag">' + txt + '</span>');
                allTags.push(txt);
                this.value = "";
                //this.focus();
            }).on('keyup', function (e) {
                // comma|enter (add more keyCodes delimited with | pipe)
                if (/(188)/.test(e.which)) $(this).focusout();
            });

            $('#tags').on('click', '.tag', function () {
                if (confirm("Delete this tag?")) {
                    for (var i = 0; i < allTags.length; i++) {
                        if (allTags[i] === $(this).text()) {
                            allTags.splice(i, 1);
                        }
                    }
                    $(this).remove();
                }
            });

            $("#submit_button").on('click', function(){
                $("#submit_artwork").click();
                $(this).val("")
            });

            $("#submit_artwork").on('submit',function (e) {
                // e.preventDefault();

                $("#tag-suggestions").val(JSON.stringify(allTags)).hide();

                alert("TEST");

                return true;
            });

        });

        /* Image preview on select start*/
        function readURL(input, v) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(v).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#updated_artwork").change(function () {
            if (this.files[0].size > 10000000) {
                if (!$("#file_err").length) {
                    $(this).after("<div class='bg-danger p-3 text-white' id='file_err'>File too large</div>");
                }

            } else {
                if ($("#file_err")) {
                    $("#file_err").remove();
                }
                readURL(this, '#artwork_image');
            }
        });
        /* Image preview on select end*/
    </script>
@endsection
