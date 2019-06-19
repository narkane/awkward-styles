@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
                <div class="card shadow  signup mt-4">
                    <div class="card-body">
                        <h2>Login</h2>

                        <div class="row">
                            <div class="col-md-5">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                                <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                            
                                <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                            
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            
                        </div>

                                   

                                     <div class="form-group">
                                        
                                            <button type="submit" class="btn btn-primary">
                                                Login
                                            </button>

                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        
                                    </div>
                                   
                                </form>
                            </div>
                            <div class="col-md-2 align-self-center">
                                <div class="or mt-4">
                                    <span>OR</span>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-sm-12 mt-4">
                                        <button type="button" class="btn btn-facebook  btn-block"><span class="icon-facebook-f"></span> Sign in with Facebook</button>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <button type="button" class="btn btn-google  btn-block"><span class="icon-google-plus-g"></span> Sign in with Google</button>
                                    </div>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
