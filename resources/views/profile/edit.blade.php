<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile Picture | 27Colours</title>
    <!-- seo -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="singing, photoshoot,modelling,talent search">
    <meta name="author" content="curiouzmindTech">
    <!-- core css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <!-- plugins css -->
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="http://27colours.com/img/logo.png"/>

    <!-- custom global css -->
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/jackedup.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:500,300,700,400' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="padding-top:0;">
<nav class="navbar navbar-default" role="navigation" style="margin: 0;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="27Colours" height=40px width="auto">
            </a>
        </div>
    </div>
</nav>
<div class="login" style="min-height: 500px">
    <div class="auth-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-5">
                    <form data-ajax="false" class="form login-page main-content center-block" id="upload" enctype="multipart/form-data" method="post" action="/profile/edit">
                        {{Form::hidden('id', $user->id)}}
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><span class="fa fa-user"></span> Update Profile Info</h3>
                            @if (Session::get('errors'))
                                <div class="alert alert-error alert-danger m0" role="alert">{{{ Session::get('errors') }}}</div>
                            @endif
                            @if (Session::get('notices'))
                                <div class="alert alert-info m0"  role="alert">{{{ Session::get('notices') }}}</div>
                            @endif
                        </div>
                        <div class="panel-body" style="min-height:300px;">
                            <div class="form-group">
                                {{ Form::label('fname', 'First-Name:') }}
                                {{ Form::text('fname', $user->first_name, ['class' => 'form-control', 'required' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('lname', 'Last-Name:') }}
                                {{ Form::text('lname', $user->last_name, ['class' => 'form-control', 'required' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('username', 'UserName:') }}
                                {{ Form::text('username', $user->username, ['class' => 'form-control', 'required' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('talents', 'Enter your talent') }}
                                {{Form::select('talents', [
                                    'dancing' => 'Dancer',
                                    'singing'=> 'Musician',
                                    'comedy'=> 'Comedian',
                                    'modelling'=> 'Model',
                                    'others' => 'Others'], 0, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('facebook', 'Enter the full url to your Facebook profile') }}
                                {{ Form::text('facebook', $user->facebook, ['class' => 'form-control', 'placeholder'=>'Facebook']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('twitter', 'Enter the full url to your Twitter account') }}
                                {{ Form::text('twitter', $user->twitter, ['class' => 'form-control', 'placeholder'=>'Twitter']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('soundcloud', 'Enter the full url to your Soundclound account') }}
                                {{ Form::text('soundcloud', $user->soundcloud, ['class' => 'form-control', 'placeholder'=>'Soundcloud']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('youtube', 'Enter the full url to your youtube') }}
                                {{ Form::text('youtube', $user->youtube, ['class' => 'form-control', 'placeholder'=>'Youtube']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('tagline', 'Enter a brief bio') }}
                                {{ Form::text('tagline', $user->tagline, ['class' => 'form-control', 'placeholder'=>'Bio']) }}
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button class="js-send btn btn-success" type="submit">Update</button>
                            <a href="/profile" class="btn btn-default" type="button">back to profile</a>
                        </div> <!-- panel-footer ends -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center footer2">
                <ul class="list-inline socials">
                    <li><a class="btn btn-facebook" href="https://www.facebook.com/27colours" target="blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="btn btn-twitter" href="https://twitter.com/27colours" target="blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="btn btn-facebook" href="https://instagram.com/27colours/" target="blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <p>Copyright &copy;
                    <script type="text/javascript">
                        var currentYr = new Date();
                        var insertYr = currentYr.getFullYear();
                        document.write(insertYr);
                    </script>,
                    27Colours - All Rights Reserved.
                </p>
            </div>
        </div>
    </div> <!-- ./ container -->
</footer>
<!-- jQuery Version 2.1.3 -->
<script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>