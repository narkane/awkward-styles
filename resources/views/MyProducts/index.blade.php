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

                        <h5>My Products</h5>

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
                        <div class="col-3">
                            Art
                            <br/>
                            Products
                        </div>
                        <div class="col-9">
                            <div class="row">
                                @foreach($items as $type => $data)
                                <div class="col-3">
                                    <a href="/mockupgenerator/{{ $data[0] }}" title="{{ $type }}">
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

</script>
@endsection
