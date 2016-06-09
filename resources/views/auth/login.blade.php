@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><span class="fa fa-unlock-alt"></span> Connect with <a class="btn btn-primary" href="/login/facebook">Facebook</a> or Sign-in below  <i class="fa fa-arrow-down"></i></h4>

                        @if (Session::has('error'))
                            <div class="alert alert-error alert-dismissable alert-danger m0" role="alert">{!! Session('error') !!}</div>
                        @endif

                        @if (Session::get('notice'))
                            <div class="alert alert-info alert-dismissable m0"  role="alert">{{{ Session::get('notice') }}}</div>
                        @endif

                        @if (Session::has('flash_reg'))
                            <div class="alert alert-error alert-dismissable alert-danger m0" role="alert">{!! Session('flash_reg') !!}</div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" accept-charset="UTF-8">
                            {!! csrf_field() !!}
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
                                </div>
                                @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <p class="help-block p0 m0">
                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                    </p>
                                    <div class="checkbox">
                                        <label>
                                             <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group last">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Login</button>
                                    <button type="reset" class="btn btn-default btn-sm">
                                        Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <h4>Don't have an account? Click <a class="bold" href="/register">here</a> to register.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection