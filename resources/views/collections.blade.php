@extends('layouts.dashboard')

@section('content')
<!-- slider -->
<div class="categories-banner">
    <img src="{{ asset('images/categories-defult-banner.jpg') }}" alt="">
</div>

<div class="collections-section">

    <div class="container">
        <h3 class="category-title">Collections</h3>
        <div class="owl-carousel " id="collections-slider" style="display:block">
            <div class="item">
                <a href="#"> <img src="{{ asset('images/collections/category/Funny.png') }}" width="10%"></a>
                <h6>Funny</h6>
            </div>
            <div class="item active">
                <a href="#"><img src="{{ asset('images/collections/category/HomeDecor.png') }}" width="10%"></a>
                <h6>Home Decor</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Parties-Events.png') }}" width="10%"></a>
                <h6>Parties & Events</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Sports.png') }}" width="10%"></a>
                <h6>Sports</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Trending.png') }}" width="10%"></a>
                <h6>Trending</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Vintage.png') }}" width="10%"></a>
                <h6>Vintage</h6>
            </div>
            <div class="item">
                <a href="#"> <img src="{{ asset('images/collections/category/Funny.png') }}" width="10%"></a>
                <h6>Funny</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/HomeDecor.png') }}" width="10%"></a>
                <h6>Home Decor</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Parties-Events.png') }}" width="10%"></a>
                <h6>Parties & Events</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Sports.png') }}" width="10%"></a>
                <h6>Sports</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Trending.png') }}" width="10%"></a>
                <h6>Trending</h6>
            </div>
            <div class="item">
                <a href="#"><img src="{{ asset('images/collections/category/Vintage.png') }}" width="10%"></a>
                <h6>Vintage</h6>
            </div>
        </div>
    </div>
</div>
<!-- slider End -->
<div class="container">

    <div class="row">
        <div class="col-md-3">
            <div class="pannel">
                <div class="refine-div">
                    <h5 class="title2">Filter</h5>
                    <div class="refine-section">
                        <div class="refine-filters">
                            <h6 data-toggle="collapse" href="#Category" role="button" aria-expanded="true"
                                aria-controls="collapseExample" class="refine-filter-title">Category</h6>
                            <div class="collapse show Filter-list" id="Category">
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
                        </div>
                        <div class="refine-filters">
                            <h6 data-toggle="collapse" href="#Color" role="button" aria-expanded="false"
                                aria-controls="collapseExample" class="refine-filter-title">Color</h6>
                            <div class="collapse Filter-list Filter-color" id="Color">
                                <ul>
                                    <li>
                                        <label class="checkbox-container">Women
                                            <svg viewBox="-1 -1 2 2">
                                                <path d="M 1 0 A 1 1 0 0 1 -1 1.2246467991473532e-16 L 0 0"
                                                    fill="CornflowerBlue"></path>
                                                <path
                                                    d="M -1 1.2246467991473532e-16 A 1 1 0 0 1 1 -2.4492935982947064e-16 L 0 0"
                                                    fill="CornflowerBlue"></path>
                                            </svg>
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">Women
                                            <svg viewBox="-1 -1 2 2">
                                                <path d="M 1 0 A 1 1 0 0 1 -1 1.2246467991473532e-16 L 0 0"
                                                    fill="#ff2200"></path>
                                                <path
                                                    d="M -1 1.2246467991473532e-16 A 1 1 0 0 1 1 -2.4492935982947064e-16 L 0 0"
                                                    fill="#ff2200"></path>
                                            </svg>
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">Women
                                            <svg viewBox="-1 -1 2 2">
                                                <path d="M 1 0 A 1 1 0 0 1 -1 1.2246467991473532e-16 L 0 0" fill="#333">
                                                </path>
                                                <path
                                                    d="M -1 1.2246467991473532e-16 A 1 1 0 0 1 1 -2.4492935982947064e-16 L 0 0"
                                                    fill="CornflowerBlue"></path>
                                            </svg>
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">Women
                                            <svg viewBox="-1 -1 2 2">
                                                <path d="M 1 0 A 1 1 0 0 1 -1 1.2246467991473532e-16 L 0 0" fill="#333">
                                                </path>
                                                <path
                                                    d="M -1 1.2246467991473532e-16 A 1 1 0 0 1 1 -2.4492935982947064e-16 L 0 0"
                                                    fill="#333"></path>
                                            </svg>
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">Women
                                            <svg viewBox="-1 -1 2 2">
                                                <path d="M 1 0 A 1 1 0 0 1 -1 1.2246467991473532e-16 L 0 0" fill="#333">
                                                </path>
                                                <path
                                                    d="M -1 1.2246467991473532e-16 A 1 1 0 0 1 1 -2.4492935982947064e-16 L 0 0"
                                                    fill="#333"></path>
                                            </svg>
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">Women
                                            <svg viewBox="-1 -1 2 2">
                                                <path d="M 1 0 A 1 1 0 0 1 -1 1.2246467991473532e-16 L 0 0" fill="#333">
                                                </path>
                                                <path
                                                    d="M -1 1.2246467991473532e-16 A 1 1 0 0 1 1 -2.4492935982947064e-16 L 0 0"
                                                    fill="#333"></path>
                                            </svg>
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="refine-filters">
                            <h6 data-toggle="collapse" href="#Size" role="button" aria-expanded="false"
                                aria-controls="collapseExample" class="refine-filter-title">Size</h6>
                            <div class="collapse Filter-list" id="Size">
                                <ul>
                                    <li>
                                        <label class="checkbox-container">S
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">M
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">L
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">XL
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">2XL
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="checkbox-container">3XL
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>

                                </ul>
                            </div>
                        </div>




                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-9">
            <div class="pannel">
                <div class="row">
                    <div class="col-sm-8">
                        <h5 class="title2">Products</h5>
                    </div>
                    <div class="col-sm-4 text-right">
                        <div class="btn-group btnSort-section" role="group">
                            <span>
                                Sort:
                            </span>
                            <button id="btnSort" type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Top Selling
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btnSort">
                                <a class="dropdown-item" href="#">Top Selling</a>
                                <a class="dropdown-item" href="#">Top Selling</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row products-row" id="art-product-list">
                    
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('footer_scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $("#collections-slider").owlCarousel({
            margin: 10,
            nav: true,
            slideSpeed: 800,
            paginationSpeed: 800,
            singleItem: true,
            pagination: true,
            autoPlay: true,
            stopOnHover: true,
            items: 8,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 8
                }
            }
        });

        $.ajax({
<<<<<<< HEAD
        url: "http://ec2-13-56-132-2.us-west-1.compute.amazonaws.com:8080/token",
=======
        url: "{{env('API_URL')}}token",
>>>>>>> dev
        contentType: 'application/json',
        dataType: 'json',
        type: 'POST',
        data: JSON.stringify({
            "privateKey": "password"
        }),
        success: (result) => {
            if (result.token) {
                $.ajax({
<<<<<<< HEAD
                    url: "http://ec2-13-56-132-2.us-west-1.compute.amazonaws.com:8080/api/artworkProduct/getAllArtProducts",
=======
                    url: "{{env('API_URL')}}api/artworkProduct/getAllArtProducts",
>>>>>>> dev
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
<<<<<<< HEAD
                                    url: "http://ec2-13-56-132-2.us-west-1.compute.amazonaws.com:8080/api/media/getById/" +
=======
                                    url: "{{env('API_URL')}}api/media/getById/" +
>>>>>>> dev
                                    artProduct.properties[i].artworkProduct.designedImage.split(",")[0],
                                    contentType: 'application/json',
                                    dataType: 'json',
                                    headers: {
                                        "Authorization": "Bearer " + result.token,
                                        "Content-Type": "application/json"
                                    },
                                    type: 'GET',
                                    success: function(images) {
                                        $('#art-product-list').append(`
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
                        } else {
                            $('#art-product-list').html(`No Art Products to Display`);
                        }                        
                    }
                });
            }
        }
        });
    });
    </script>
    @endsection