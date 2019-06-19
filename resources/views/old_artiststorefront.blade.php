@extends('layouts.app')

@section('content')

<div class="container">

        <div class="artistprofile" style="background-image: url('images/artist-banner.png')">
            <div class="artistpic">
                <img src="images/artist-defult.png" alt="" class="artistpicimg">
                <a href="#" class="artist-socialshare"><span class="icon-share-alt"></span></a>
            </div>
            <h3 class="artistname">Lucky Sans</h3>
            <p><strong>ID 00712 Member Since 2016</strong> </p>
            <p><span class="icon-map-marker-alt"></span> Gujarat, India</p>
            <div>
                <button type="button" class="btn btn-primary btn-lg">Fallow</button>
            </div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Artist</a></li>
                <li class="breadcrumb-item active" aria-current="page">Marc Summers</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-xl-9 col-lg-9">
                <div class="media mb-4">
                    <img src="images/artist-defult.png" class="img-fluid rounded-circle mr-3" alt="Generic placeholder image">
                    <div class="media-body">
                        <h4 class="mt-0">About Marc Summers</h4>
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


                            <div class="row products-row">
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image">
                                            <a href="#"><img src="images/products/product-1.png"></a>
                                            <span class="product-new-label">Sale</span>
                                            <span class="product-discount-label">20%</span>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                            <div class="price">
                                                $5.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image">
                                            <a href="#"><img src="images/products/product-2.png"></a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                            <div class="price">
                                                $10.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image">
                                            <a href="#"><img src="images/products/product-3.png"></a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                            <div class="price">
                                                $10.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image">
                                            <a href="#"><img src="images/products/product-4.png"></a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                            <div class="price">
                                                $10.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image">
                                            <a href="#"><img src="images/products/product-5.png"></a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                            <div class="price">
                                                $10.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image artist-grid">
                                            <a href="#"><img src="images/products/product-6.png"></a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                            <div class="price">
                                                $5.00
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 item">
                                    <div class="product-grid artist-grid">
                                        <div class="product-image artist-grid">
                                            <a href="#"><img src="images/products/product-7.png"></a>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="title">Men's Plain Tshirt</h3>
                                
@endsection
