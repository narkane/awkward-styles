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
                            <span class="badge badge-pill badge-light rounded-border py-2 px-4 border border-dark">
                                Page(s):
                                @for($i = 1; $i <= ceil(($totalFound / $take)); $i++)

                                    @if($i == $currentPage)
                                        {{$i}}
                                    @else
                                        <u>{{$i}}</u>
                                    @endif

                                @endfor
                            </span>
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
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center" style="justify-content: flex-end !important;" id="mypagination">
                        
                    </ul>
                </nav>
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

        
    });
    </script>
    @endsection