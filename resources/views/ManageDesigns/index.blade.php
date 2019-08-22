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
                            <li><a href="#">My Designs</a></li>
                        </ul>
                    </div>

                    <div class="row bg-white mt-4 my-accont-forms p-4">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-8">
                                    <h5>My Designs</h5>
                                </div>
                                <div class="col-4 text-right">
                                    <label for="storesort">StoreFront</label>
                                    <select name="storesort" id="storesort" class="form-control">
                                        <option value="all">View All Products</option>
                                        @foreach($storefronts as $storefront)
                                            <option value="{{ $storefront->id }}"
                                                    @if(app('request')->input('sort') === $storefront->id)
                                                        selected="selected"
                                                    @endif
                                            >{{ $storefront->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row products-row" id="art-product-list">

                                    @isset($designs)
                                        @foreach($designs as $design)
                                                <div class="col item">
                                                    <div class="product-grid">
                                                        <div class="product-image">
                                                            <a href="{{url('/')}}/product-details/">
                                                                <img src="{{ URL("api/designs/images") }}/{{ $design->product_id }}/XS/{{ $design->id }}"
                                                                style="max-width: 300px; max-height: 300px;" />
                                                            </a>
                                                        </div>
                                                        <div class="product-content">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <i class="fa fa-plus" style="color: blue;"></i>
                                                                    <small>Add To Product(s)</small>
                                                                </div>
                                                                <div class="col-4">
                                                                    <i class="fa fa-edit" style="color: green;"></i>
                                                                    Edit
                                                                </div>
                                                                <div class="col-4">
                                                                    <i class="fa fa-minus" style="color: red;"></i>
                                                                    Delete
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                    @endisset

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <script>
        $(document).ready(function(){
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
@endsection
