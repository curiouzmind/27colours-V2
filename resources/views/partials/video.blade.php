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
        <div class="col-md-4 col-xs-12">
            <div class="">
              <a href="{{ action('VideoController@getShow', array('slug'=>$video->slug,'id'=> $video->id))}}">
                  <div class="post-img-boxed center-block">
                      @if( isset($video->youtube))
                          <div class="">
                              <iframe width="100%" height="400px" src="//www.youtube.com/embed/{{$video->youtube}}?rel=0"
                                      frameborder="0" allowfullscreen></iframe>
                          </div>
                      @elseif ( isset($video->video))
                          <div id="wrapper">
                              <video class="video-js" preload="metadata" poster="" data-setup="{}">
                                  <source src="{{asset($video->video)}}" type="video/mp4">
                                  <source src="{{asset($video->video)}}" type="video/webm">
                              </video>
                          </div>
                      @else
                          <p class="text-center alert alert-info"  role="alert"> Invalid Video or YouTube link!!! </p>
                      @endif
                  </div> </a>
                <h4 class="text-uppercase upload-title"><i class="fa fa-video-camera fa-fw"></i>
                    @if($video->caption!=='')
                        <a href="{{ action('VideoController@getShow', array('slug'=>$video->slug,'id'=> $video->id))}}">{{$video->title}}</a>
                    @else
                        <a href="{{ action('VideoController@getShow', array('slug'=>$video->slug,'id'=> $video->id))}}">Watch here</a>
                    @endif
                </h4>
                <p class="text-uppercase uploader"><i class="fa fa-user fa-fw"></i>
                    <a href="{{ action('ProfileController@getShow', array('id'=>$video->user->id))}}">{{$video->user->username}}</a>

                    <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$video->likes->count()}}
                </p>
                <p class="clearfix">
                    <span class="badge">{{$video->video_type}}</span>
                    <span class="badge"><i class="fa fa-clock-o"></i> {{$video->timeago}}</span>
                </p>
            </div>
        </div>
@endforeach
@endif