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
                        <a href="/addproducts/new" alt="Add New Product" title="Add New Product" type="button" class="btn btn-secondary">
                            Add New Product
                        </a>
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
</div>
<script>

</script>
@endsection
