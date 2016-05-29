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
    <div class="owl-carousel">
        @foreach ($galleries as $gallery)
            <div class="thumbnail">
                <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">
                    <img src="{{$gallery->image}}" alt="">
                </a>
                <div class="caption">
                    <h4 class="text-uppercase upload-title">
                        <i class="fa fa-camera-retro"></i>
                        @if($gallery->caption!=='')
                            <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">{{$gallery->caption}}</a>
                        @else
                            <a href="{{ action('GalleryController@getShow', array('id'=> $gallery->id))}}">Caption This!</a>
                        @endif
                    </h4>
                    <p class="text-uppercase uploader">
                        <i class="fa fa-user fa-fw"></i>
                        <a href="{{ action('ProfileController@getShow', array('id'=>$gallery->user->id))}}">{{$gallery->user->username}}</a>

                        <span class="badge pull-right"><i class="fa fa-heart"> </i>{{$gallery->likes->count()}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endif