@extends('layouts.dashboard')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="pannel">
                <div class="row">
                    <div id="mockupgen">
                        <iframe src="{{url('/')}}/mockupgen/index.html" scrolling="no"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                  @endsection