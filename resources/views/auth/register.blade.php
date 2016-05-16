@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><span class="fa fa-unlock-alt"></span> Connect with <a href="#">Facebook</a> or Sign-up below  <i class="fa fa-arrow-down"></i></h4>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="inputUsername3" class="col-sm-3 control-label">
                                    Username</label>
                                <div class="col-sm-9">
                                     <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                </div>
                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="inputEmail3" class="col-sm-3 control-label">
                                    Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                 @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="inputPassword3" class="col-sm-3 control-label">
                                    Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password_confirmation" class="col-sm-3 control-label">
                                    Retype Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password_confirmation">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                            </div>
                            <div class="form-group{{ $errors->has('terms') ? ' has-error' : '' }}">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <div class="checkbox ">
                                            <label>
                                                 <input type="checkbox" name="terms"> <p>I agree with the <a target="_blank" href="#">Terms and Conditions</a></p>
                                            </label>

                                            @if ($errors->has('terms'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('terms')}}</strong>
                                             </span>
                                            @endif

                                        </div>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Register</button>
                                    <button type="reset" class="btn btn-default btn-sm">
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        Already registered? Click <a class="bold" href="/login">here</a> to sign in.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection