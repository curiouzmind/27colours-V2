<!-- Celebrity Endorsements -->
<div class="embed-responsive embed-responsive-16by9" style="margin: 10px 0 5px 0; min-height:320px;">
    <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0"
            frameborder="0" allowfullscreen></iframe>
</div>
<hr>
<!-- Facebook Like box -->
<div class="fb-widget">
    <div class="fb-page" data-href="https://www.facebook.com/27colours"
         data-width="250" data-height="250" data-hide-cover="false"
         data-show-facepile="true" data-show-posts="false">
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/27colours">
                <a href="https://www.facebook.com/27colours">27 colours Facebook Page</a></blockquote>
        </div>
    </div>
</div>
<hr>
<!-- Featured Uploads-->
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title text-center">Featured Videos</h3>
    </div>
    <div class="panel-body">
        <!-- Fetch Songs -->
        @foreach ($recentVideos as $video)
            <div class="list-group">
                <a href="{{ action('VideoController@getShow', array('id'=> $video->id))}}" class="list-group-item clearfix">
            <span class="list-group-image pull-left">
                @if($video->image!=='')
                    {{HTML::image($video->image, $video->title,array('class'=>'sidebar-thumb-img', 'width' => 100 , 'height' => 100))}}
                @else
                    {{HTML::image('img/video-player-2.PNG','thumbnail',array('class'=>'sidebar-thumb-img', 'style'=>'padding:10px', 'width' => 100 , 'height' => 100, 'style'=>'padding:10px;'))}}
                @endif
            </span>
                    <h4 class="list-group-item-text m0 upload-title p10-top"><i class="fa fa-video-camera"></i> {{$video->title}}</h4>
                    <p class="list-group-item-text uploader"><i class="fa fa-user"></i> {{$video->user->username}}</p>
            <span class="pull-right p10-right">
                <span class="badge"><i class="fa fa-clock-o"></i> {{$video->timeago}}</span>
                <span class="badge">{{$video->video_type}}</span>
            </span>
                </a>
            </div>
        @endforeach
    </div>
</div>