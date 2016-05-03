<!-- Errors, Alerts -->
@if (Session::get('errors'))
    <p class="alert alert-error alert-danger fade in" role="alert"><a>
    {{{ Session::get('errors') }}}</a></p>
@endif
@if (Session::get('notices'))
    <p class="alert alert-info fade in" role="alert"><a>
    {{{ Session::get('notices') }}}</a></p>
@endif
@if ($talents->isEmpty())
    <p class="text-center alert alert-info"  role="alert"> There are no Talents!</p>
@else
    <!-- Fetch Pictures -->
    <div class="owl-carousel">
            @foreach ($talents as $talent)
            @if(isset($talent->profilePhoto->image))
            <div class="thumbnail grey-light-bg">
                <a href="{{ action('ProfileController@getShow', array('id'=> $talent->id))}}">
                    @if(isset($talent->profilePhoto->image))
                        <img src="{{$talent->profilePhoto->image}}" alt="">
                    @else
                        <img src="{{asset('img/user.jpg')}}" alt="">
                    @endif
                </a>
                <div class="caption">
                    <h4 class="text-uppercase upload-title">
                        <i class="fa fa-user fa-fw"></i>
                        @if($talent->username!=='')
                            <a href="{{ action('ProfileController@getShow', array('id'=> $talent->id))}}">{{$talent->username}}</a>
                        @else
                            <a href="{{ action('ProfileController@getShow', array('id'=> $talent->id))}}">Unknown!</a>
                        @endif
                    </h4>
                    <p class="text-uppercase uploader">
                        @if($talent->talents!=='')
                            <span class="badge">{{$talent->talents}}</span>
                        @else
                            <span class="badge">cap!</span>
                        @endif
                    </p>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endif