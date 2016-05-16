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
    <h3 class="panel-title text-center">Featured Songs</h3>
</div>
<div class="panel-body">
    <!-- Fetch Songs -->
@foreach ($recentSongs as $song)
    <div class="list-group">
        <a href="{{ action('SongController@getShow', array('id'=> $song->id))}}" class="list-group-item clearfix">
            <span class="list-group-image pull-left">
                @if($song->image!=='')
                    {{HTML::image($song->image, $song->title,array('class'=>'sidebar-thumb-img', 'width' => 100 , 'height' => 100))}}
                @else
                    {{HTML::image('img/music-avatar-2.PNG','thumbnail',array('class'=>'sidebar-thumb-img', 'width' => 100 , 'height' => 100, 'style'=>'padding:10px;'))}}
                @endif
            </span>
            <h4 class="list-group-item-text m0 upload-title p10-top"><i class="fa fa-music"></i> {{$song->title}}</h4>
            <p class="list-group-item-text uploader"><i class="fa fa-user"></i> {{$song->user->username}}</p>
            <span class="pull-right p10-right">
                <span class="badge"><i class="fa fa-clock-o"></i> {{$song->timeago}}</span>
                <span class="badge">{{$song->genre}}</span>
            </span>
        </a>
    </div>
@endforeach
</div>
</div>