@extends('layouts.dashboard')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-3">
            @include('menu');
        </div>

        <div class="col-md-9">

            <div class="container p-4">

                <div class="container-fluid">
                    <ul class="my-account-nav">
                        <li><a href="{{ url("/createstore") }}">My Stores</a> <span class="icon-caret-right"></span></li>
                        <li><a href="#">My Products</a></li>
                    </ul>
                    <div class="float-right">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#itemListModal">
                            Add New Product
                        </button>
                    </div>
                </div>

                <div class="row bg-white mt-4 my-accont-forms p-4">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-8">
                                <h5>My Products</h5>
                            </div>
                            <div class="col-4 text-right">
                                <select name="storesort" id="storesort">
                                    <option value="all">View All Products</option>
                                    @foreach($storefronts as $storefront)
                                        <option value="{{ $storefront->id }}">{{ $storefront->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="row products-row" id="art-product-list">

                            @isset($myProducts)
                                @foreach($myProducts as $req)
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

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="itemListModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true">
        <div class="modal-dialog w-75 mw-100" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Select A Product Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 border-right">
                            <ul class="list-group">
                                <li class="list-group-item" onclick="openDiv('art')">
                                    <h4>
                                       Art
                                    </h4>
                                    <small>Select art</small>
                                </li>
                                <li class="list-group-item" onclick="openDiv('product')">
                                    <h4>
                                        Product
                                    </h4>
                                    <small>Select A Product</small>
                                </li>
                        </div>
                        <div class="col-9">
                            <div class="row product-detail" id="artDiv" style="overflow-y: scroll">
                                @foreach($artworks as $artwork)
                                    <div class="col-3" style="max-width: 300px">
                                        <div class="card p-3">
                                            <img src="{{ $artwork->url }}" class="card-img-top"
                                                 style="max-width: 150px; max-height: 150px;"
                                                id="{{ $artwork->id }}">
                                            <div class="body text-center">
                                                <h5>{{ $artwork->artname}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row product-detail" id="productDiv">
                                @foreach($items as $type => $data)
                                <div class="col-3" style="max-width: 300px;">
                                    <a href="/mockupgenerator/{{ $data[0] }}" title="{{ $type }}" class="img_url">
                                        <img src="{{ $data[1] }}" style="max-width: 300px; max-height: 300px;"/>
                                        <h4 style="text-align: center">{{ strtoupper($type) }}</h4>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>

    function openDiv(type){
        // Types are Art and Product
        productDiv = $("#productDiv");
        artDiv = $("#artDiv");

        if(type === 'art'){
            productDiv.hide();
            artDiv.show();
        } else {
            productDiv.show();
            artDiv.hide();
        }
    }

    function removeFromSelected(id){
        for(let i in artSelected){
            if(artSelected[i] === id){
                artSelected.splice(i,1);
                i--;
            }
        }
    }

    function appendToUrl(){
        let artworkUrl = "?";
        for(let i in artSelected){
            artworkUrl += "art_id[]=" + artSelected[i] + "&";
        }

        $(".img_url").each(function(){
            let src = $(this).attr('href').split("?")[0];
            $(this).attr('href', src + artworkUrl.substring(0,artworkUrl.length - 1));
        });
    }

    openDiv('art');

    var artSelected = [];

    $(document).ready(function(){
        $(".card-img-top").on('click', function(){
            if($(this).parent().hasClass('img_selected')){
                $(this).parent().removeClass('img_selected');
                removeFromSelected($(this).attr('id'));
            } else {
                $(this).parent().addClass('img_selected');
                artSelected.push($(this).attr('id'));
            }
            appendToUrl();
        });

        $("#storesort").on('change', function(){

            let params = '{{ app('request')->input('sort') }}';
           // Append To This URL
           let url = '{{ url()->current() }}';
           let val = $(this).val();

           if(params === '' && val !== 'all' && val !== params){
               window.location.href = url + "?sort=" + val;
           }
           if(params !== '' && val === 'all'){
               window.location.href = url;
           }
        });
    });

</script>
    <style>
        .img_selected {
            background-color: rgba(0,150,255,0.5);
        }

        .list-group-item {
            cursor: pointer;
        }

        .list-group-item:hover,
        .list-group-item:active {
            background-color: rgba(0,150,255,0.5);
        }
    </style>
@endsection
