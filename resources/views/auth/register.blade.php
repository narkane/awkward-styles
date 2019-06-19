@extends('layouts.app')

@section('content')


<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-xl-10">
                <div class="card shadow  signup mt-4">
                    <div class="card-body">
                        <h2>Sign Up</h2>

                        <div class="row">
                            <div class="col-md-5">
                                 <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                  {{ csrf_field() }}

                                    
                                     <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="First Name">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                         <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            

                            
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus placeholder="Last Name">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            
                                <input id="email" type="email" placeholder="Email Address" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group">
                           

                            
                                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                            
                        </div>
                        <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                            <label class="form-check-label" for="gridCheck">
                                                    I Accept the Terms of Use & Privacy Policy
                                              </label>
                                        </div>
                                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
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
