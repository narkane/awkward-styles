@extends('layouts.dashboard')

@section('content')
<div class="product-container bg-white p-5">

    <div class="row">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white">
                    <li class="breadcrumb-item"><a href="/list">Home</a></li>
                    <li class="breadcrumb-item"><a href="/products">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page"
                        id="current_category">{{ $category }}</li>
                </ol>
            </nav>

                <div class="row">
                    <div class="col-2 p-3 border-right">

                        <h2>{{ $category }}</h2>

                        @if(in_array($category,$cloth_cats))
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/shirt?count={{$take}}" title="T-Shirts">T-Shirts</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/tank?count={{$take}}" title="TankTops">Tank Tops</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/hoodie?count={{$take}}" title="Hoodies">Hoodies</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/jacket?count={{$take}}" title="Jackets">Jackets</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/sweatshirt?count={{$take}}" title="SweatShirt">Sweat Shirts</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/pants?count={{$take}}" title="Pants">Pants</a></h4>
                            </li>
                            <li class="list-group-item">
                                <h4><a href="/products/{{$category}}/shorts?count={{$take}}" title="Shorts">Shorts</a></h4>
                            </li>
                        </ul>
                        @endif

                        <h3>Categories</h3>
                        <ul class="list-group list-group-flush">
                            @foreach($category_list as $cats)

                                @if($cats == $category)
                                <li class="list-group-item active">
                                    {{ $cats }}
                                </li>
                                @elseif(in_array($cats,$cloth_cats))
                                <li class="list-group-item">
                                    <h5><a href="/products/{{$cats}}/@if($type!=null){{$type}}@endif" title="{{$cats}}">{{$cats}}</a></h5>
                                </li>
                                @else
                                    <li class="list-group-item">
                                        <h5><a href="/products/{{$cats}}/" title="{{$cats}}">{{$cats}}</a></h5>
                                    </li>
                                @endif

                            @endforeach
                        </ul>

                    </div>

                    <div class="col-10">
                        <div class="row">
                            <div class="col-sm-7">
                                <h5>
                                    <div id="carouselPaginationContainer" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left"
                                         data-ride="carousel" data-interval="false">

                                        <div class="carousel-inner px-3">
                                            @foreach($paginator as $area => $links)

                                                <div class="carousel-item @if($area == $paginatorArea) active @endif">
                                                    Page(s):

                                                    @foreach($links as $page)

                                                        @if($page == $currentPage)
                                                            {{$page}}
                                                        @else
                                                            <a href="{{ $url }}page={{$page}}" title="Page {{$page}}">{{$page}}</a>
                                                        @endif

                                                    @endforeach

                                                </div>

                                            @endforeach


                                        </div>

                                        <a class="carousel-control-prev" href="#carouselPaginationContainer" role="button" data-slide="prev">
                                            <span class="carousel-control-arrow-icon-left" aria-hidden="true"></span>
                                            <span class="sr-only text-dark">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselPaginationContainer" role="button" data-slide="next">
                                            <span class="carousel-control-arrow-icon-right" aria-hidden="true"></span>
                                            <span class="sr-only text-dark">Next</span>
                                        </a>
                                    </div>
                                </h5>
                            </div>
                            <div class="col-sm-5 text-right">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="totalCount" class="d-inline">Filter Items Per Page</label>
                                        <select class="form-control w-25 d-inline" id="totalCount">
                                            @for($i = 25; $i <= 100; $i+=25)
                                                @if($i == $take)
                                                    <option value="{{$i}}"selected>{{$i}}</option>
                                                @else
                                                    <option value="{{$i}}">{{$i}}</option>
                                                @endif
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <h5>
                                            <span class="badge badge-pill badge-light rounded-border py-2 px-5 border border-dark">
                                                Found <u>{{$totalFound}}</u> results
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                        <div class="row products-row" id="art-product-list">

                            @foreach($request as $prod)
                                @if(!empty($prod->full_url))
                                <div class="product-content p-2 text-center">
                                    <img src="{{$prod->full_url}}" class="product-image">
                                    <h6 class="product-detals">{{$prod->label}}</h6>
                                    <h4 class="product-price">$ {{number_format((float)$prod->salePrice, 2, '.', '')}}</h4>
                                </div>
                                @endif
                            @endforeach

                        </div>

                        <div class="row">
                            <div class="col-sm-9">
                                <h5>
                                    <div id="carouselPaginationContainerTwo" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left"
                                         data-ride="carousel" data-interval="false">

                                        <div class="carousel-inner px-3">
                                            @foreach($paginator as $area => $links)

                                                <div class="carousel-item @if($area == $paginatorArea) active @endif">
                                                    Page(s):

                                                    @foreach($links as $page)

                                                        @if($page == $currentPage)
                                                            {{$page}}
                                                        @else
                                                            <a href="{{ $url }}page={{$page}}" title="Page {{$page}}">{{$page}}</a>
                                                        @endif

                                                    @endforeach

                                                </div>

                                            @endforeach


                                        </div>

                                        <a class="carousel-control-prev" href="#carouselPaginationContainerTwo" role="button" data-slide="prev">
                                            <span class="carousel-control-arrow-icon-left" aria-hidden="true"></span>
                                            <span class="sr-only text-dark">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselPaginationContainerTwo" role="button" data-slide="next">
                                            <span class="carousel-control-arrow-icon-right" aria-hidden="true"></span>
                                            <span class="sr-only text-dark">Next</span>
                                        </a>
                                    </div>
                                </h5>
                            </div>
                            <div class="col-sm-1 text-right">
                                <h5><span class="badge badge-pill badge-light rounded-border py-2 px-5 border border-dark">
                                        Found <u>{{$totalFound}}</u> results
                                    </span></h5>
                            </div>
                            <div class="col-sm-2"></div>
                        </div>

                    </div>
                </div>
        </div>
    </div>
    <style>
        .product-container {
            width: 100%;
            margin: 0;
            margin-top: 100px;
            background-color: #ffffff;
            padding: 20px;
        }
    </style>
    @section('footer_scripts')
        <script>
            $(document).ready(function(){
                $("#totalCount").on('change', function(){
                    var url = window.location.href.split("?")[0];
                    window.location.href = url + "?count=" + $(this).val();
                });
            });
        </script>
    @endsection
</div>
