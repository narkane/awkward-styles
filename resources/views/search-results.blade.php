@extends('layouts.dashboard')

@section('content')

<div class="container">

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
                </div>
                


                <div class="row products-row" id="art-product-list">

                    @isset($request)
                        @foreach(json_decode($request) as $req)
                            <div class="col-3 item">
                                <div class="product-grid">
                                    <div class="product-image">
                                        <a href="{{url('/')}}/product-details/{{$req->id}}">
                                            <img src="{{$req->full_url}}">
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
                        @endforeach
                    @endisset



                        <script type="text/javascript" language="javascript">
                var sData = {{ $request }};

                console.log(sData);

                    if(sData.length == 0){
                        console.log("NADA DAWG!");
                        document.write('<meta http-equiv="Refresh" content="0; url=/products">');
                    }
                
                for(let i = 0; i < sData.length; i++) {
                    for(let j = 0; j < sData[i].length; j++) {
                    $.ajax({
                        url: "{{env('API_URL')}}api/media/getById/" +
                        sData[i][j].image.split(",")[0],
                        contentType: 'application/json',
                        dataType: 'json',
                        headers: {
                            "Authorization": "Bearer " + '{{$token}}',
                            "Content-Type": "application/json"
                        },
                        type: 'GET',
                        success: function(images) {
                            $('#art-product-list').append(`
                                <div class="col-3 item">
                                    <div class="product-grid">
                                        <div class="product-image">
                                            <a href="{{url('/')}}/product-details/${sData[0][0].id}">
                                                <img src="${images.properties.full_url}">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h5 class="title">${sData[0][0].label}</h5>
                                            <div class="price">
                                                $${sData[0][0].salePrice}
                                            </div>
                                     </div>
                                    </div>
                                </div>                        
                            `);
                            console.log(images);
                            console.log(images.properties.full_url);
                        }
                    });
                console.log((i+1)+" * "+(j+1)+" = "+(i+1)*(j+1));
                console.log('====================');

                console.log('areas: '+sData.length);
                console.log('results per area: '+sData[0].length);
                console.log('total results: '+sData.length*sData[0].length)}};
            </script>

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