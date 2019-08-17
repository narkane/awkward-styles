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
                </div>

                <div class="row bg-white mt-4 my-accont-forms p-4">
                    <div class="col-md-12">

                        Products

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection
