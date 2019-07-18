@extends('layouts.dashboard')

@section('content')

<div class="container panel">

    <div class="row">
        <div class="col-md-12">
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
                    <div class="col-md-10">
                        <h5>
                            <div id="carouselPaginationContainer" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left" data-ride="carousel">

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
                    <div class="col-md-2 text-right">
                        <h5><span class="badge badge-pill badge-light rounded-border py-2 px-5 border border-dark">Found <u>{{$totalFound}}</u> results</span></h5>
                    </div>
                </div>

                <div class="row products-row" id="art-product-list">

                    @isset($request)
                        @foreach($request as $req)
                            @if(isset($req->id))
                                <div class="col item">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="{{url('/')}}/product-details/{{$req->id}}">
                                                <img src="{{ $req->full_url}}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="title">{{$req->label}}</h5>
                                            <div class="price">
                                                {{$req->salePrice}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endisset

                </div>

                <nav aria-label="Page navigation example" class="w-100 text-center">
                    <h5>
                        @if($currentPage > 1)
                            <a href="{{ $url }}page={{ $currentPage - 1 }}" title="Previous">Previous Page</a>
                        @endif

                        <div id="carouselPaginationContainerTwo" class="carousel slide badge badge-pill badge-light rounded-border py-2 px-4 border border-dark w-25 text-left" data-ride="carousel">

                            <div class="carousel-inner px-5">
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

                        @if($currentPage < $totalPages)
                            <a href="{{ $url }}page={{ $currentPage + 1 }}" title="Next">Next Page</a>
                        @endif
                    </h5>
                </nav>
            </div>
        </div>
    </div>
    @endsection
    @section('footer_scripts')
        <script>
            $("#carouselPaginationContainer").carousel({
                interval: false
            });
            $("#carouselPaginationContainerTwo").carousel({
                interval: false
            });
        </script>
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

        
    });
    </script>
    @endsection