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
<div id="products" class="row list-group">
@foreach ($songs as $song)
        <div class="item  col-xs-12 col-sm-6 col-lg-3">
            <div class="thumbnail">
                @if($song->image!=='')
                    {{HTML::image($song->image, $song->title,array('class'=>'img-responsive group list-group-image'))}}
                @else
                    {{HTML::image('img/music-avatar-2.png','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                @endif
                <div class="caption">
                    <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                        <i class="fa fa-music fa-fw"></i>
                        <a href="{{ action('SongController@getShow', array('slug'=>$song->slug,'id'=> $song->id))}}">{{$song->title}}</a>
                    </h4>
                    <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                        <a href="{{ action('ProfileController@getShow', array('id'=>$song->user->id))}}">{{$song->user->username}}</a>

                        <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$song->likes->count()}}
                    </p>
                    <p class="clearfix">
                        <span class="badge"> {{$song->genre}}</span>
                        <span class="badge"><i class="fa fa-clock-o"></i> {{$song->timeago}}</span>
                    </p>
                </div>
            </div>
        </div>
@endforeach
</div>
@endif