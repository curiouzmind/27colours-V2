@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading">Didn't receive an email confirmation from 27Colours?</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                      <!--  <form class="form-horizontal" role="form" method="POST" action="/testing/email">
                            {!! csrf_field() !!} -->

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-1">
                                   <!-- <button type="submit" class="btn btn-danger btn-lg">
                                    </button>-->
                                       <a class="btn btn-danger btn-lg" href="/testing/email"><i class="fa fa-btn fa-envelope"></i> Resend Email Confirmation</a>

                                </div>
                            </div>
                       <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection