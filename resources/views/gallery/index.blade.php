@extends('layout.master')
@section('title')
    <title>Pictures | 27Colours</title>
    @stop
    @section('css-links')
    <style type="text/css">
    .badge .fa{
        color: #9C0000;
    }
    </style>
    @endsection
    @section('content')
            <!-- page header -->
    <div class="page-banner well">
        <div class="overlay-bg text-center">
            <div class="container">
                <h2 class="text-uppercase bold">Pictures</h2>
                <h4 class="text-capitalize">Browse collections of pictures.</h4>
            </div>
        </div>
    </div>
    <!-- posts -->
    <div class="">
        {{--categories nav-tabs bar --}}
        <div class="row categories-bar well">
            <div class="col-md-12">
                <div class="container">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="active"><a class="" href="#modelling" data-toggle="tab">Modelling</a></li>
                        <li><a class="" href="#others" data-toggle="tab">Others</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Errors, Alerts -->
                @if (Session::get('errors'))
                    <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                @endif
                @if (Session::get('notices'))
                    <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                @endif
                {{--tab-content--}}
                <div class="col-md-8">
                    <div class="tab-content">
                        <!-- modelling -->
                        <div class="tab-pane fade active in" id="modelling">
                            @if ($modelling->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no track here :( !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($modelling as $model)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($model->image!=='')
                                                {{HTML::image($model->image, $model->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-camera-retro fa-fw"></i>
                                                    @if($model->caption!=='')
                                                        <a class="" href="{{ action('GalleryController@getShow', array('id'=> $model->id))}}">{{$model->caption}}</a>
                                                    @else
                                                        <a href="{{ action('GalleryController@getShow', array('id'=> $model->id))}}">Caption This!</a>
                                                    @endif
                                                </h4>
                                                <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                    <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$model->user->id))}}">{{$model->user->username}}</a>

                                                        <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$model->likes->count()}}
                                                </p>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$model->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{$modelling -> links() }}
                        </div>
                        <!-- others -->
                        <div class="tab-pane fade" id="others">
                            @if ($others->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no picture here :( !</p>
                                @else
                                        <!-- Fetch pictures -->
                                @foreach ($others as $other)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($other->image!=='')
                                                {{HTML::image($other->image, $other->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                {{--<h4 class="list-group-item-text m0 upload-title p10-top"><i class="fa fa-music"></i> {{$song->title}}</h4>--}}
                                                <h4 class="list-group-item-text m0 upload-title p10-top">
                                                    <i class="fa fa-camera-retro fa-fw"></i>
                                                    @if($other->caption!=='')
                                                        <a class="" href="{{ action('GalleryController@getShow', array('id'=> $other->id))}}">{{$other->caption}}</a>
                                                    @else
                                                        <a href="{{ action('GalleryController@getShow', array('id'=> $other->id))}}">Caption This!</a>
                                                    @endif
                                                </h4>
                                                <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                    <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$other->user->id))}}">{{$other->user->username}}</a>

                                                        <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$model->likes->count()}}
                                                </p>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$other->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{$others -> links() }}
                        </div>
                    </div>
                </div>
                {{--sidebar--}}
                <div class="col-md-4">
                    @include('gallery.gallery-sidebar')
                </div>
            </div> <!-- ./ row ends -->
        </div>
    </div>
@stop