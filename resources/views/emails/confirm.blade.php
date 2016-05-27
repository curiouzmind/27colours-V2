@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-7">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>You can't perform some cool stuffs until you confirm your Account </h4>
                    <p>Please, check your Email inbox/junk/spam folders for your activation email.</p></div>
                    <div class="panel-body">
                        <p>If you still can't find your email, click the resend link below</p>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">                           
                                   <a class="btn btn-danger btn-md" href="/confirmation/resend"><i class="fa fa-btn fa-envelope"></i> Resend email</a>
                                    
                                </div>
                            </div>
                       <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection