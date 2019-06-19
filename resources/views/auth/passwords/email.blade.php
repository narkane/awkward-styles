@extends('layouts.app')

@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
                <div class="card shadow  signup mt-4">
                    <div class="card-body">
                        <h2>Reset Password</h2>

                        <div class="row">
                            <div class="col-md-5">

               
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                                <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            
                        </div>
                   </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
