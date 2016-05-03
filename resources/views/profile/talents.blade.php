@extends('layout.master')
    @section('title')
        <title>Talents | 27Colours</title>
    @stop
    @section('content')
        <!-- page header -->
        <div class="page-banner well">
            <div class="overlay-bg text-center">
                <div class="container">
                    <h2 class="text-uppercase bold">Talents</h2>
                    <h4 class="text-capitalize">Browse profiles of Talents.</h4>
                </div>
            </div>
        </div>
        <!-- posts -->
        <div class="">
            {{--categories nav-tabs bar --}}
            <div class="well p5">
                <div class="container">
                <div class="row categories-bar">
                <div class="col-md-12">
                    <div class="container">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="active"><a class="" href="#modelling" data-toggle="tab">Models</a></li>
                            <li><a class="" href="#singing" data-toggle="tab">Music</a></li>
                            <li><a class="" href="#dancing" data-toggle="tab">Dance</a></li>
                            <li><a class="" href="#comedy" data-toggle="tab">Comedy</a></li>
                            <li><a class="" href="#fans" data-toggle="tab">Fans</a></li>
                        </ul>
                    </div>
                </div>
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
                                @if ($models->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no profile here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($models as $model)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if(isset($model->profilePhoto->image))
                                                    {{HTML::image($model->profilePhoto->image, $model->username,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-user fa-fw"></i>
                                                        @if($model->username!=='')
                                                            <a class="" href="{{ action('ProfileController@getShow', $model->id,
                                                            array('id'=> $model->id))}}">{{$model->username}}</a>
                                                        @else
                                                            <a href="{{ action('ProfileController@getShow', $model->username, array('id'=> $model->id))}}">Unknown</a>
                                                        @endif
                                                    </h4>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$model->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$models -> links() }}
                            </div>
                            <!-- music -->
                            <div class="tab-pane fade" id="singing">
                                @if ($musicians->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no profile here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($musicians as $musician)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if(isset($musician->profilePhoto->image))
                                                    {{HTML::image($musician->profilePhoto->image, $musician->username,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-user fa-fw"></i>
                                                        @if($musician->username!=='')
                                                            <a class="" href="{{ action('ProfileController@getShow', $musician->id,
                                                            array('id'=> $musician->id))}}">{{$musician->username}}</a>
                                                        @else
                                                            <a href="{{ action('ProfileController@getShow', $musician->username, array('id'=> $musician->id))}}">Unknown</a>
                                                        @endif
                                                    </h4>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$musician->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$musicians -> links() }}
                            </div>
                            <!-- music -->
                            <div class="tab-pane fade" id="dancing">
                                @if ($dancers->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no profile here :( !</p>
                                    @else
                                            <!-- Fetch Songs -->
                                    @foreach ($dancers as $dancer)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if(isset($dancer->profilePhoto->image))
                                                    {{HTML::image($dancer->profilePhoto->image, $dancer->username,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-user fa-fw"></i>
                                                        @if($dancer->username!=='')
                                                            <a class="" href="{{ action('ProfileController@getShow', $dancer->id,
                                                            array('id'=> $dancer->id))}}">{{$dancer->username}}</a>
                                                        @else
                                                            <a href="{{ action('ProfileController@getShow', $dancer->username, array('id'=> $dancer->id))}}">Unknown</a>
                                                        @endif
                                                    </h4>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$dancer->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$dancers -> links() }}
                            </div>
                            <!-- comedy -->
                            <div class="tab-pane fade" id="comedy">
                                @if ($comedians->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no profile here :( !</p>
                                    @else
                                            <!-- Fetch talents -->
                                    @foreach ($comedians as $comedian)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if(isset($comedian->profilePhoto->image))
                                                    {{HTML::image($comedian->profilePhoto->image, $comedian->username,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-user fa-fw"></i>
                                                        @if($comedian->username!=='')
                                                            <a class="" href="{{ action('ProfileController@getShow', $comedian->id,
                                                            array('id'=> $comedian->id))}}">{{$comedian->username}}</a>
                                                        @else
                                                            <a href="{{ action('ProfileController@getShow', $comedian->username, array('id'=> $comedian->id))}}">Unknown</a>
                                                        @endif
                                                    </h4>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$comedian->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$comedians -> links() }}
                            </div>
                            <!-- fans -->
                            <div class="tab-pane fade" id="fans">
                                @if ($fans->isEmpty())
                                    <p class="text-center alert alert-info"  role="alert"> no profile here :( !</p>
                                    @else
                                            <!-- Fetch talents -->
                                    @foreach ($fans as $fan)
                                        <div class="item grid-thumbs col-xs-12 col-sm-6 col-lg-4">
                                            <div class="thumbnail">
                                                @if(isset($fan->profilePhoto->image))
                                                    {{HTML::image($fan->profilePhoto->image, $fan->username,array('class'=>'img-responsive group list-group-image'))}}
                                                @else
                                                    {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                                @endif
                                                <div class="caption">
                                                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                                        <i class="fa fa-user fa-fw"></i>
                                                        @if($fan->username!=='')
                                                            <a class="" href="{{ action('ProfileController@getShow', $fan->id,
                                                            array('id'=> $fan->id))}}">{{$fan->username}}</a>
                                                        @else
                                                            <a href="{{ action('ProfileController@getShow', $fan->id, array('id'=> $fan->id))}}">Unknown</a>
                                                        @endif
                                                    </h4>
                                                    <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$fan->timeago}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <!-- pagination -->
                                {{$fans -> links() }}
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
