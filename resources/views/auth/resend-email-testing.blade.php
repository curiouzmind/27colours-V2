@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Didn't receive an email confirmation from 27Colours?Please check your spam and junk folders also.. </h4></div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-1">
                                   
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