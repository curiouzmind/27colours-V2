@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Please visit your email address {{ $user->email }} to activate your account</h4></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">                           
                                   <a class="btn btn-danger btn-md" href="/profile"><i class="fa fa-btn fa-envelope"></i> My profile</a>
                                    
                                </div>
                            </div>
                       <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection