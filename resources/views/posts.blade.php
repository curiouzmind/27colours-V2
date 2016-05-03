        <div class="container">
            
            <div class="featured-tab">
                <h2 class="section-heading text-left">Featured</h2>
                <ul class="nav nav-pills nav-stacked col-md-3 padding-2px square-tabs">
                    <li class="active">
                        <a class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-audio" 
                            href="#songs" data-toggle="tab"><i class="fa fa-music fa-fw"></i> Songs</a>
                    </li>
                    <li>
                        <a class="ui-btn ui-corner-all ui-btn-icon-left ui-icon-video"
                         href="#videos" data-toggle="tab"><i class="fa fa-video-camera fa-fw"></i> Videos</a>
                    </li>
                    <li>
                        <a class="ui-btn"
                         href="#pictures" data-toggle="tab"><i class="fa fa-camera fa-fw"></i>  Pictures</a>
                    </li>
                </ul>
                <div class="tab-content col-md-9 padding-2px my-page">
                    <!-- featured songs -->
                    <div class="tab-pane fade active in" id="songs">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($songs->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Songs!</p>
                        @else
                        <!-- Fetch Songs -->
                        @foreach ($songs as $song)
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post1">
                                      <a href="{{action('SongController@getShow', array('id'=> $song->id))}}">
                                     
                                          <div class="post-img-boxed center-block">
                                            @if($song->image!=='')
                               {{HTML::image($song->image, $song->title,array('class'=>'img-responsive thumbnail center-block'))}}
                               @else
                                {{HTML::image('img/music-avatar-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                      </a>
                                        <h4 class="post-title userinfo-details">
                                        <i class="fa fa-music fa-fw"></i> {{ HTML::linkAction('SongController@getShow', $song->title, array('id'=> $song->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $song->user->username, array('id'=>$song->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left" style="max-width: 75%;">
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li> 
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                        </ul>
                                    </div>
                            </div>
                        @endforeach
                        @endif 
                        <br />
                        <!-- pagination -->
                        {{ $songs->links() }}
                       
                    </div>
                    <!-- featured videos -->
                    <div class="tab-pane fade in" id="videos">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($videos->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Videos!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($videos as $video)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post2">
                                      <a href="{{ action('VideoController@getShow', array('id'=> $video->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            @if($video->image != '')
                                 {{HTML::image($video->image, $video->title,array('class'=>'img-responsive thumbnail center-block'))}}
                                @else
                                {{HTML::image('img/video-player-2.jpg','thumbnail',array('width' => 100 , 'height' => 100))}}
                               @endif
                                          </div>
                                        </figure> </a>
                                        <h4 class="post-title userinfo-details ui-icon-video">
                                            <i class="fa fa-video-camera"></i> {{ HTML::linkAction('VideoController@getShow', 
                                            $video->title, array('id'=> $video->id), array('class'=>'', 'data-ajax'=>'false'))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $video->user->username, array('id'=>$video->user->id),
                                            array('class'=>'post-uploader userinfo-details', 'data-ajax'=>'false'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left">
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                        </ul>
                                     
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <!-- pagination -->
                        <br />
                        {{ $videos->links() }} 
                        
                    </div>
                     <!-- featured pictures -->
                    <div class="tab-pane fade in" id="pictures">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($galleries->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Pictures!</p>
                        @else
                        <!-- Fetch Pictures -->
                        @foreach ($galleries as $gallery)
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6" style="padding:0 2px;">
                                    <div class="featured-post3">
                                      <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">
                                        <figure>
                                          <div class="post-img-boxed center-block">
                                            {{ HTML::image($gallery->image, $gallery->caption, array('class'=>'img-responsive thumbnail center-block')) }}
                                          </div>
                                        </figure></a>
                                        <h4 class="post-title userinfo-details">
                                            <i class="fa fa-camera"></i> {{ HTML::linkAction('GalleryController@getShow', 
                                            $gallery->caption, array('id'=> $gallery->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@getShow', $gallery->user->username, array('id'=>$gallery->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
                                        </p>  
                                        <ul class="post-util list-inline pull-left">
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-comments"></i> 20 </li>
                                            <li class="hidden" data-toggle="tooltip" data-placement="right" title="Coming soon"><i class="fa fa-heart"></i> 20 </li>
                                            <li class="post-time"><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                        </ul>
                                      </a>
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <br>
                        <br />
                        <!-- pagination -->
                        {{$galleries->links()}} 
                        
                    </div>
                </div>
            </div>
        </div>