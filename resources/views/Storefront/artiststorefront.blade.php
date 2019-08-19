@extends('layouts.dashboard')

@section('content')

<div class="container-fluid m-0 p-0 bg-white">

     @isset($storefronts)
@if($storefronts)
                                  
                                 
        <div class="artistprofile" style="background-image: url('{{ url($storefronts->banner_image_path) ?  url($storefronts->banner_image_path) :  url('/').'/images/artist-banner.png' }}');
                background-repeat: no-repeat; background-size: cover;background-position-y:20%;">
            <div class="artistpic">
                <img src="{{ url($storefronts->logo_path) ?  url($storefronts->logo_path) :  url('/').'/images/artist-defult.png' }}"
                     alt="" class="img-fluid rounded-circle" style="max-width:250px; max-height:250px;border: 5px solid #fff;"/>
                <a href="#" class="artist-socialshare"><span class="icon-share-alt"></span></a>
            </div>

            <div class="artist-image-info">
                <h3 class="artistname">{{ $owner_data[0]->name }}</h3>
                <p><strong>ID {{ $owner_data[0]->id }} Member Since {{ date("m / Y",strtotime($owner_data[0]->created_at)) }}</strong> </p>
                <p><span class="icon-map-marker-alt"></span> {{ $owner_data[0]->city }}, US</p>
                <div>
                    <button type="button" class="btn bg-primary btn-lg px-5 font-weight-bolder">
                        @if($i_follow) Unfollow @else Follow @endif
                    </button>
                </div>
            </div>
        </div>
         @else
         @endif
        @endisset
        <div class="row m-5">

            <div class="col-md-3">

                <ul class="list-group" id="category-groups">

                    <!-- BEGIN SORTBY -->
                    <li class="list-group-item artist-list-headers">
                        <i class="fa fa-chevron-right" style="font-size:12px"></i>
                        <a id="sortByPointer" href="#collapseSortBy" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSortBy">
                            Sort By
                        </a>
                        <h5 id="chosenSortBy" style="float:right"></h5>
                    </li>
                    <li class="collapse list-group-item artist-list-items" id="collapseSortBy">
                        <div class="container-fluid">
                            <ul class="list-group" id="choices_SortBy">
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Popular
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Newest
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Cheapest
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Most Expensive
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- END SORT BY -->

                    <!-- BEGIN DEPARTMENTS -->
                    <li class="list-group-item artist-list-headers">
                        <i class="fa fa-chevron-right" style="font-size:12px"></i>
                        <a id="departmentPointer" href="#collapseDepartment" data-toggle="collapse" aria-expanded="false" aria-controls="collapseDepartment">
                            Departments
                        </a>
                        <h5 id="chosenDepartment" style="float:right"></h5>
                    </li>
                    <li class="collapse list-group-item artist-list-items" id="collapseDepartment">
                        <div class="container-fluid">
                            <ul class="list-group" id="choices_Department">
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        All
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Shirts
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Hoodies
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Bags
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Wall Art
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Furniture
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Home Decor
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- END DEPARTMENTS -->

                    <!-- BEGIN PRODUCTS -->
                    <li class="list-group-item artist-list-headers">
                        <i class="fa fa-chevron-right" style="font-size:12px"></i>
                        <a id="productsPointer" href="#collapseProducts" data-toggle="collapse" aria-expanded="false" aria-controls="collapseProducts">
                            Products
                        </a>
                        <h5 id="chosenProducts" style="float:right"></h5>
                    </li>
                    <li class="collapse list-group-item artist-list-items" id="collapseProducts">
                        <div class="container-fluid">
                            <ul class="list-group" id="choices_Products">
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        All
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                       Art Prints
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Framed Prints
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Canvas Prints
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Metal Prints
                                    </a>
                                </li>
                                <li class="list-group-item artist-list-items">
                                    <a href="javascript:void(0);" alt="Popular">
                                        Wood Wall Art
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- END PRODUCTS -->
                </ul>

            </div>

            <div class="col-xl-6 px-5">
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
                <div class="media mb-4">
                    <img src="{{ url($storefronts->logo_path) ?  url($storefronts->logo_path) :  url('/').'/images/artist-defult.png' }}" style="width:200px" class="img-fluid rounded-circle mr-3" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0">About @if(count($owner_data)>0){{ $owner_data[0]->name }} @else John Thummel @endif</h4>
                        {{ $owner_data[0]->about_you }}
                    </div>
                </div>
                <div class="project-tab">
                    <ul class="nav mb-3 artist-tab-list" id="artist-tab" role="tablist">
                        <li class="nav-item artist-tab-list-item">
                            <a class="nav-link active" id="artist-art-tab" href="#artist-art">
                                Art
                            </a>
                        </li>
                        <li class="nav-item artist-tab-list-item">
                            <a class="nav-link" id="artist-shop-tab" href="#artist-shop">
                                Shop
                            </a>
                        </li>
                        <li class="nav-item artist-tab-list-item">
                            <a class="nav-link" id="artist-collections-tab" href="#artist-collections">
                                Collections
                            </a>
                        </li>
                        <li class="nav-item artist-tab-list-item">
                            <a class="nav-link" id="artist-posts-tab" href="#artist-posts">
                                Posts
                            </a>
                        </li>
                        <li class="nav-item artist-tab-list-item">
                            <a class="nav-link" id="artist-promoted-tab" href="#artist-promoted">
                                Promoted
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="artist-tabContent">
                        <div id="artist-tab-info">
                            <div class="row products-row" id="artProduct-list">
                                TEST
                            </div>
                            <div id="artProduct-list-more"></div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="artist-right">
                    <div class="artist-lists">
                        <h5 class="mb-4">Followers <span class="badge badge-pill badge-info">@if(isset($total_followers)) {{ $total_followers }} @else {{ count($followers) }} @endif</span></h5>
                        <ul class="artist-falowers-list">
                            @foreach($followers as $follower)
                            <li>
                                <a href="#">
                                    @if(isset($follower->image))
                                        <img src="{{ url('/') }}{{ $follower->image }}" alt="">
                                    @else
                                        <h1>
                                            <i class="fa fa-user-alt" style="color: {{ random_color() }}"></i>
                                        </h1>
                                    @endif
                                    <h6>{{ $follower->user[0]->name}}</h6>
                                </a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="artist-lists mt-4">
                        <h5 class="mb-4">Reviews</h5>
                        <ul class="artist-reviews-list">
                            <li>
                                <div class="artist-reviews-row">
                                    <div>
                                        @if(isset($follower->image))
                                            <img src="{{ url('/') }}{{ $follower->image }}" alt="">
                                        @else
                                            <h1>
                                                <i class="fa fa-user-alt" style="color: {{ random_color() }}"></i>
                                            </h1>
                                        @endif
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

    /**
     * Move the arrow for all main titles selected
     */
     $("#category-groups").children("li.artist-list-headers").children("a").on('click',function(){
        // Get arrow
        let arrow = $(this).siblings(".fa")
        let oldArrow = (arrow.hasClass("fa-chevron-right")) ? "fa-chevron-right" : "fa-chevron-down";

        arrow.removeClass(oldArrow);
        arrow.addClass((oldArrow === "fa-chevron-right") ? "fa-chevron-down" : "fa-chevron-right");
    });

     $("li.collapse").children('.container-fluid').children("ul.list-group").children("li.artist-list-items").children("a").on('click', function(){

         let type = $(this).closest("ul").attr('id').split("_")[1];
         console.log(type);

         $("#chosen"+type).html($(this).html());

     });

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