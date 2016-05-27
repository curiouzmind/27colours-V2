@extends('layout.master')
@section('title')
    <title>{{$user->username}} | 27Colours</title>
@stop
@section('css-links')
@stop
@section('header')
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    @stop
    @section('content')
            <!-- page header -->
    <div class="page-banner well profile-header">
        <div class="overlay-bg text-center">
            <div class="container">
                <div class="thumbnail center-block" style="width: 100px; height: 100px;border-radius:50%;overflow: hidden;">
                    @if($user->profilePhoto)
                        {{HTML::image($user->profilePhoto->image, $user->username,array('class'=>'img-responsive center-block','width' => 'auto', 'height' => '100%'))}}
                    @else
                        {{HTML::image('img/user.PNG','thumbnail',array('class'=>'img-responsive','width' => '100px', 'height' => '100px', 'style'=>'padding:10px;'))}}
                    @endif
                </div>
                <h2 class="text-uppercase bold"><i class="fa fa-user fa-fw"></i> {{$user->username}}</h2>
                <h4 class="text-capitalize"> {{ $user->full_name }}</h4>
                <p><span class="badge">{{$user->talents}}</span></p>
                <ul class="list-inline socials">
                    <li><a class="btn btn-facebook" href="{{$user->facebook_url}}" target="blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="btn btn-twitter" href="{{$user->twitter_url}}" target="blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="btn btn-facebook" href="{{$user->facebook_url}}" target="blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-cog"></i> Profile actions <span class="caret"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- posts -->
    <div class="">
        <div class="collapse" id="collapseExample">
            <ul class="list-inline p10 m0 text-center">
                <li class="p50"><a class="btn btn-default btn-sm" href="{{action('ProfileController@getPhoto')}}">Change Picture</a></li>
                <li class="p50"><a class="btn btn-default btn-sm" href="{{action('ProfileController@getEdit', $user->id)}}">Edit Profile</a></li>
                <li class="p50 dropdown">
                    <a href="#" class="btn btn-music btn-sm" id="dLabel" data-target="#" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Add Songs <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="/song/upload">Upload from device / desktop</a></li>
                       <!-- <li><a href="/song/upload">Upload with Soundcloud Link</a></li> -->
                    </ul>
                </li>
                <li class="p50 dropdown">
                    <a href="#" class="btn btn-video btn-sm" id="dLabel" data-target="#" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Add Videos <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <li><a href="/video/upload">Upload from device / desktop</a></li>
                       <!-- <li><a href="/video/upload">Upload with Youtube Link</a></li> -->
                    </ul>
                </li>
                <li class="p50"><a href="/gallery/upload" class="btn btn-picture btn-sm">Add Pictures</a></li>
            </ul>
        </div>
        {{--categories nav-tabs bar --}}
        <div class="row categories-bar well">
            <div class="col-md-12">
                <div class="container">
                    <ul class="nav nav-tabs text-uppercase">
                        <li class="active"><a class="" href="#songs" data-toggle="tab">
                                <span class="badge">{{$s_count}}</span> Songs <i class="fa fa-music"></i></a>
                        </li>
                        <li><a class="" href="#videos" data-toggle="tab">
                                <span class="badge">{{$v_count}}</span> Videos <i class="fa fa-video-camera"></i></a>
                        </li>
                        <li><a class="" href="#pictures" data-toggle="tab">
                                <span class="badge">{{$g_count}}</span> Pictures <i class="fa fa-camera-retro"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!-- Errors, Alerts -->

                @if (Session::has('errors'))
                    div class="alert alert-error fade in">
                   <a href="#" class="close" data-dismiss="alert">&times;</a>
                           <p> {{{ Session::get('errors') }}} </p>
                @endif
                @if (Session::has('notices'))
                   <div class="alert alert-success fade in">
                   <a href="#" class="close" data-dismiss="alert">&times;</a>
                   <p> {!! Session::get('notices') !!}</p></div>
                
                @endif
                {{--tab-content--}}
                <div class="col-md-8">
                    <div class="tab-content">
                        <!-- songs -->
                        <div class="tab-pane fade active in" id="songs">
                            @if ($songs->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no song yet !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($songs as $song)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($song->image!=='')
                                                {{HTML::image($song->image, $song->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-music fa-fw"></i>
                                                    <a class="" href="{{ action('SongController@getShow', array('id'=> $song->id))}}">{{$song->title}}</a>
                                                </h4>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$song->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{--{{$songs -> links() }}--}}
                        </div>
                        <!-- videos -->
                        <div class="tab-pane fade" id="videos">
                            @if ($videos->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no video yet !</p>
                                @else
                                        <!-- Fetch Songs -->
                                @foreach ($videos as $video)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($video->image!=='')
                                                {{HTML::image($video->image, $video->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-video-camera fa-fw"></i>
                                                    <a class="" href="{{ action('VideoController@getShow', array('id'=> $video->id))}}">{{$video->title}}</a>
                                                </h4>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$video->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{--{{$videos -> links() }}--}}
                        </div>
                        <!-- pictures -->
                        <div class="tab-pane fade" id="pictures">
                            @if ($galleries->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> no picture yet !</p>
                                @else
                                        <!-- Fetch Galleries -->
                                @foreach ($galleries as $gallery)
                                    <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                        <div class="thumbnail">
                                            @if($gallery->image!=='')
                                                {{HTML::image($gallery->image, $gallery->title,array('class'=>'img-responsive group list-group-image'))}}
                                            @else
                                                {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                            @endif
                                            <div class="caption">
                                                <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                    <i class="fa fa-camera-retro fa-fw"></i>
                                                    @if($gallery->caption!=='')
                                                        <a class="" href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">{{$gallery->caption}}</a>
                                                    @else
                                                        <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">Caption This!</a>
                                                    @endif
                                                </h4>
                                                <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="clearfix"></div>
                            <!-- pagination -->
                            {{--{{$galleries -> links() }}--}}
                        </div>
                    </div>
                </div>
                {{--sidebar--}}
                <div class="col-md-4">
                    @include('profile.talent-sidebar')
                </div>
            </div> <!-- ./ row ends -->
        </div>
    </div>
    @stop
   