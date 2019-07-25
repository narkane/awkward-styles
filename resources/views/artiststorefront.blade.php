@extends('layouts.dashboard')

@section('content')

<div class="container">

     @isset($storefronts)
@if(count($storefronts)>0)
                                  @foreach($storefronts as $storefront)
                                  
                                 
        <div class="artistprofile" style="background-image: url('{{ url($storefront->banner_image_path) ?  url($storefront->banner_image_path) :  url('/').'/images/artist-banner.png' }}');background-repeat: no-repeat; background-size: cover;">
            <div class="artistpic">
                <img height="100" width="100" src="{{ url($storefront->logo_path) ?  url($storefront->logo_path) :  url('/').'/images/artist-defult.png' }}" alt="" class="artistpicimg">
                <a href="#" class="artist-socialshare"><span class="icon-share-alt"></span></a>
            </div>
            <h3 class="artistname">{{ $storefront->name }}</h3>
            <p><strong>ID 00712 Member Since 2016</strong> </p>
            <p><span class="icon-map-marker-alt"></span> Newyork, US</p>
            <div>
                <button type="button" class="btn btn-primary btn-lg">Follow</button>
            </div>
        </div>

         @endforeach
         @else
         @endif
        @endisset

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Artist</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                        @if(isset($owner_data) && count($owner_data)>0)
                            {{ $owner_data[0]->name }}
                        @else
                            John Thummel
                        @endif

                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-9 col-lg-9">
                <div class="media mb-4">
                    <img src="{{ url('images/artist-defult.png') }}" style="width:200px" class="img-fluid rounded-circle mr-3" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0">About @if(count($owner_data)>0){{ $owner_data[0]->name }} @else John Thummel @endif</h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <div class="project-tab">
                    <ul class="nav nav- mb-3" id="artist-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="artist-1-tab" data-toggle="pill" href="#artist-1" role="tab" aria-controls="artist-1" aria-selected="true">Men</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="artist-2-tab" data-toggle="pill" href="#artist-2" role="tab" aria-controls="artist-2" aria-selected="false">Women</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="artist-3-tab" data-toggle="pill" href="#artist-3" role="tab" aria-controls="artist-3" aria-selected="false">Kids & Babies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="artist-4-tab" data-toggle="pill" href="#artist-4" role="tab" aria-controls="artist-4" aria-selected="false">Mugs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="artist-5-tab" data-toggle="pill" href="#artist-5" role="tab" aria-controls="artist-5" aria-selected="false">Hats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="artist-6-tab" data-toggle="pill" href="#artist-6" role="tab" aria-controls="artist-6" aria-selected="false">Tote Bages</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="artist-tabContent">
                        <div class="tab-pane fade show active" id="artist-1" role="tabpanel" aria-labelledby="artist-1-tab">

                        <div class="row products-row" id="artProduct-list">                        
                                

                        </div>
                        <div id="artProduct-list-more"></div>

                        
                        
                        </div>
                        <div class="tab-pane fade" id="artist-2" role="tabpanel" aria-labelledby="artist-2-tab">
                            2nd tab
                        </div>
                        <div class="tab-pane fade" id="artist-3" role="tabpanel" aria-labelledby="artist-3-tab">
                            3rd tab
                        </div>
                        <div class="tab-pane fade" id="artist-4" role="tabpanel" aria-labelledby="artist-4-tab">
                            4th tab
                        </div>
                        <div class="tab-pane fade" id="artist-5" role="tabpanel" aria-labelledby="artist-5-tab">
                            5th tab
                        </div>
                        <div class="tab-pane fade" id="artist-6" role="tabpanel" aria-labelledby="artist-6-tab">
                            6th tab
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="artist-right">
                    <div class="artist-lists">
                        <h5 class="mb-4">Followers <span class="badge badge-pill badge-dark">20</span></h5>
                        <ul class="artist-falowers-list">
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ url('/') }}/images/artist-defult.png" alt="">
                                    <h6>Praveen Bituku</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="artist-lists mt-4">
                        <h5 class="mb-4">Reviews</h5>
                        <ul class="artist-reviews-list">
                            <li>
                                <div class="artist-reviews-row">
                                    <div class="col-4">
                                        <img src="{{ url('/') }}/images/artist-defult.png" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-8">
                                        <h6>Praveen</h6>
                                        <span class="locatin-span text-muted"><span class="icon-map-marker-alt"></span> Borabanda, Hyderabad</span>
                                    </div>


                                </div>

                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>

                            </li>
                            <li>
                                <div class="artist-reviews-row">
                                    <div>
                                        <img src="{{ url('/') }}/images/artist-defult.png" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6>Praveen</h6>
                                        <span class="locatin-span text-muted"><span class="icon-map-marker-alt"></span> Borabanda, Hyderabad</span>
                                    </div>


                                </div>

                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>

                            </li>
                            <li>
                                <div class="artist-reviews-row">
                                    <div>
                                        <img src="{{ url('/') }}/images/artist-defult.png" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6>Praveen</h6>
                                        <span class="locatin-span text-muted"><span class="icon-map-marker-alt"></span> Borabanda, Hyderabad</span>
                                    </div>


                                </div>

                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</p>

                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
                                
@endsection
@section('footer_scripts')
<script type="text/javascript" language="javascript">
$(document).ready(function() {
    $.ajax({
        url: "{{env('API_URL')}}token",
        contentType: 'application/json',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({
            "privateKey": "password"
        }),
        success: (result) => {
            if (result.token) {
                $.ajax({
                    url: "{{env('API_URL')}}api/artworkProduct/getAllArtProducts",
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        "Authorization": "Bearer " + result.token,
                        "Content-Type": "application/json"
                    },
                    type: 'GET',
                    success: function(artProduct) { 
                        console.log("----",artProduct);
                        if(artProduct.properties.length) {
                            for(let i = 0; i < artProduct.properties.length; i++) {
                                $.ajax({
                                    url: "{{env('API_URL')}}api/media/getById/" +
                                    artProduct.properties[i].artworkProduct.designedImage.split(",")[0],
                                    contentType: 'application/json',
                                    dataType: 'json',
                                    headers: {
                                        "Authorization": "Bearer " + result.token,
                                        "Content-Type": "application/json"
                                    },
                                    type: 'GET',
                                    success: function(images) {
                                        $('#artProduct-list').append(`
                                            <div class="col-4 item">
                                                <div class="product-grid">
                                                    <div class="product-image">
                                                        <a href="{{url('/')}}/product-details/${artProduct.properties[i].product.id}">
                                                            <img src="${images.properties.full_url}">
                                                        </a>
                                                    </div>
                                                    <div class="product-content">
                                                        <h5 class="title">${artProduct.properties[i].product.label}</h5>
                                                        <div class="price">
                                                            $${artProduct.properties[i].product.salePrice}
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
                            $('#artProduct-list-more').append(`
                                <div class="col-12 mb-4 text-center">
                                    <a href="#" class="btn btn-outline-dark">Load More</a>
                                </div>
                            `);                        
                        } else {
                            $('#art-product-list').html(`<h4>No Data Available...</h4>`);
                        }                        
                    }
                });
            }
        }
    });
});
</script>
@endsection