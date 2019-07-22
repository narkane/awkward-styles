@extends('layouts.toolHead');

@section('content')

<div class="row products-row" style="float:left;border:3px inset lightblue;height:100%;">
    <div id="art-product-list">
        <div id="app">
            <thetool prodid="{{$product_id}}"/>
        </div>
    </div>

   <div  style="position:absolute;z-index:-20;padding:0px 150px;">
            <div class="product-image">
                <a href="{{url('/')}}/product-details/{{ $request->id }}">
                    <img id="productImage" src="{{ $request->full_url }}" style="border:1px solid black;"/>
                    <br/>{{$request->id}}
                </a>
            </div>
            <div class="product-content">
                <h5 class="title">{{ $request->label }}</h5>
                <div class="price">
                    {{ $request->salePrice }}
                </div>
            </div>
        </div>
</div>

@endsection