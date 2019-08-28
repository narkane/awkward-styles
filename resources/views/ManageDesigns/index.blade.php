@extends('layouts.dashboard')

@section('content')

    <div class="container">

        <div id="flash_message">
        </div>

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
                                                <div class="col item" id="{{ $design->product_id }}_{{ $design->id }}">
                                                    <div class="product-grid">
                                                        <div class="product-image border rounded">
                                                            <a href="{{url('/')}}/product-details/{{ $design->product_id }}/{{ $design->id }}">
                                                                <img src="{{ URL("api/designs/images") }}/{{ $design->product_id }}/XS/{{ $design->id }}?thumbnail"
                                                                style="max-width: 200px; max-height: 200px;" />
                                                            </a>
                                                        </div>
                                                        <div class="product-content">

                                                                    <button class="btn btn-success">
                                                                        <i class="fa fa-edit"></i>
                                                                        Edit
                                                                    </button>

                                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                                                        <i class="fa fa-trash-alt text-lightS"></i>
                                                                        Delete
                                                                    </button>

                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                    @endisset

                                    <!-- MODAL FOR DELETION -->
                                        <div class="modal" id="deleteModal" tabindex="-1" role="dialog"
                                             aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Design</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center" id="deleteDesignModal">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="held_id" id="held_id" value="0"/>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                                        </button>
                                                        <button type="button" class="btn btn-primary" id="delete_my_design"
                                                                data-dismiss="modal">Delete Design
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
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

            // Edit Product - Send to Mockup Generator
            $(".btn-success").on('click', function(){
                let vars = $(this).parent().parent().parent().attr('id').split("_");

                // Mockup
                window.location.href = '/mockupgenerator/' + vars[0] + '/' + vars[1];

            });

            // Delete Product

            $(".btn-danger").on('click', function () {
                let vars = $(this).parent().parent().parent().attr('id').split("_");

                // Fill Delete Modal
                let deleteModal = $("#deleteDesignModal");

                $("#held_id").val(vars);

                deleteModal.html("<div class=\"bg-danger text-light\"><p class=\"lead\">Are you sure?</p>"
                    + "<small>Once deleted, all designs on all products will be removed.</small></div>"
                    + "<img src='{{ URL("api/designs/images") }}/" + vars[0] + "/XS/" + vars[1] + "' style='max-width: 300px; max-height: 300px;'/>");

            });

            $("#delete_my_design").on('click', function () {

                let design_id = $("#held_id").val().split(",")[1];

                $.ajax({

                    url: "{{ url("api/removeDesign") }}",
                    type: 'GET',
                    data: {
                        design_id: design_id
                    },

                    success: (result) => {
                        console.log(result);

                        let flash = $("#flash_message");

                        if(result.status !== "error") {
                            let col_id = function(){
                                let v = $("#held_id").val().split(",");
                                return v[0] + "_" + v[1];
                            };

                            $("#" + col_id).remove();
                            flash.html('<div class="alert-success">' + result.msg + '</div>');
                        } else {
                            flash.html('<div class="alert-danger">' + result.msg + '</div>');
                        }
                        $('html,body').animate({ scrollTop: 0 }, 'fast');
                    },
                    error: (err, data) => {
                        console.log("ERROR: " + JSON.stringify(err));
                    }
                });

            });

        });
    </script>
    <style>
        .btn-danger {
            background-color: red;
        }
    </style>
@endsection
