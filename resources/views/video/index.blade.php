@extends('layout.master')
@section('title')
    <title>Videos | 27Colours</title>
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
                <h2 class="text-uppercase bold">Videos</h2>
                <h4 class="text-capitalize">Browse collections of videos.</h4>
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
                        <li class="active"><a class="" href="#music" data-toggle="tab">Music</a></li>
                        <li><a class="" href="#dance" data-toggle="tab">Dance</a></li>
                        <li><a class="" href="#comedy" data-toggle="tab">Comedy</a></li>
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
                        <!-- music -->
                        <div class="tab-pane fade active in" id="music">
                            @if ($musics->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no video here :( !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($musics as $music)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($music->image!=='')
                                                {{HTML::image($music->image, $music->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-video-camera fa-fw"></i>
                                                    <a class="" href="{{ action('VideoController@getShow', array('slug'=>$music->slug,'id'=> $music->id))}}">{{$music->title}}</a>
                                                </h4>
                                                <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                    <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$music->user->id))}}">{{$music->user->username}}</a>

                                                        <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$music->likes->count()}}
                                                  </span>
                                                </p>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i>{{$music->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{$musics -> links() }}
                        </div>
                        <!-- dance -->
                        <div class="tab-pane fade in" id="dance">
                            @if ($dances->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no video here :( !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($dances as $dance)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($dance->image!=='')
                                                {{HTML::image($dance->image, $dance->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-video-camera fa-fw"></i>
                                                    <a class="" href="{{ action('SongController@getShow', array('slug'=>$dance->slug,'id'=> $dance->id))}}">{{$dance->title}}</a>
                                                </h4>
                                                <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                    <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$dance->user->id))}}">{{$dance->user->username}}</a>

                                                     <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$dance->likes->count()}}   
                                                </p>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$dance->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{$dances -> links() }}
                        </div>
                        <!-- comedy -->
                        <div class="tab-pane fade in" id="comedy">
                            @if ($comedies->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no video here :( !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($comedies as $comedy)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($comedy->image!=='')
                                                {{HTML::image($comedy->image, $comedy->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-video-camera fa-fw"></i>
                                                    <a class="" href="{{ action('SongController@getShow', array('slug'=>$comedy->slug,'id'=> $comedy->id))}}">{{$comedy->title}}</a>
                                                </h4>
                                                <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                                    <a class="" href="{{ action('ProfileController@getShow',
                                                        array('id'=>$comedy->user->id))}}">{{$comedy->user->username}}</a>

                                                        <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$comedy->likes->count()}}
                                                </p>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$comedy->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{$comedies -> links() }}
                        </div>
                    </div>
                </div>
                {{--sidebar--}}
                <div class="col-md-4">
                    @include('video.video-sidebar')
                </div>
            </div> <!-- ./ row ends -->
        </div>
    </div>
@stop