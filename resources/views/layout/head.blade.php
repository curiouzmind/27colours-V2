<nav class="[ navbar navbar-default navbar-fixed-top ][ navbar-bootsnipp animate ]" data-spy="affix" role="navigation">
    <div class="[ container ]">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="[ navbar-header ]">
            <button type="button" class="[ navbar-toggle collapsed]" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="[ sr-only ]">Toggle navigation</span>
                <span class="[ icon-bar ]"></span>
                <span class="[ icon-bar ]"></span>
                <span class="[ icon-bar ]"></span>
            </button>
            <div class="[ animbrand ]">
                <a class="[ p50 ][ navbar-brand ][ animate ]" href="/">
                    <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="27Colours">
                </a>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="[ collapse navbar-collapse ]" id="bs-example-navbar-collapse-1">
            <!-- navigation -->
            <ul class="nav navbar-nav navbar-left">
                <li class="[ dropdown ]">
                    <a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">Explore <span class="[ caret ]"></span></a>
                    <ul class="[ dropdown-menu ]" role="menu">
                        <li><a href="/song" class="[ animate ]">Tracks <span class="[ pull-right glyphicon glyphicon-music ]"></span></a></li>
                        <li><a href="/videos" class="[ animate ]">Videos  <span class="[ pull-right glyphicon glyphicon-hd-video ]"></span></a></li>
                        <li><a href="/galleries" class="[ animate ]">Gallery  <span class="[ pull-right glyphicon glyphicon-picture ]"></span></a></li>
                        <li><a href="/talents" class="[ animate ]">Talents  <span class="[ pull-right glyphicon glyphicon-user ]"></span></a></li>
                    </ul>
                </li>
                @if(Auth::check() && Auth::user()->is_admin)
                <li class="[ dropdown ]">
                    <a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">Admin Pages <span class="[ caret ]"></span></a>
                    <ul class="[ dropdown-menu ]" role="menu">
                        <li><a href="/admin" class="[ animate ]">Dashboard <span class="[ pull-right fa fa-dashboard ]"></span></a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <ul class="[ nav navbar-nav navbar-right ]">
                <li class="[ visible-xs ]">
                    <form action="#" method="GET" role="search">
                        <div class="[ input-group ]">
                            <input type="text" class="[ form-control ]" name="q" placeholder="Search for Tracks, Videos, Pictures & Talents">
								<span class="[ input-group-btn ]">
									<button class="[ btn btn-primary ]" type="submit"><span class="[ glyphicon glyphicon-search ]"></span></button>
									<button class="[ btn btn-danger ]" type="reset"><span class="[ glyphicon glyphicon-remove ]"></span></button>
								</span>
                        </div>
                    </form>
                </li>
                <!-- check if logged in -->
                @if(Auth::check())
                <li class="[ dropdown ]">
                    <a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">
                        Welcome,  <span class="[ glyphicon glyphicon-user ]"></span> {{ Auth::user()->username }}
                        <span class="[ caret ]"></span>
                    </a>
                    <ul class="[ dropdown-menu ]" role="menu">

                        <li><a href="/profile" class="[ animate ]">
                                Profile <span class="[ pull-right glyphicon glyphicon-user ]"></span></a>
                        </li>
                        <li><a href="/song/upload" class="[ animate ]">
                                Add Songs <span class="[ pull-right glyphicon glyphicon-music ]"></span></a>
                        </li>
                        <li><a href="/video/upload" class="[ animate ]">
                                Add Videos
                                <span class="[ pull-right glyphicon glyphicon-hd-video ]"></span></a>
                        </li>
                        <li><a href="/gallery/upload" class="[ animate ]">
                                Add Pictures <span class="[ pull-right glyphicon glyphicon-picture ]"></span></a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="\logout" class="[ animate ]">
                                Logout  <span class="[ pull-right glyphicon glyphicon-off ]"></span></a>
                        </li>
                    </ul>
                </li>
                @else
                {{--<li class="[ dropdown ]">--}}
                    {{--<a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">Sign Up <span class="[ caret ]"></span></a>--}}
                    {{--<ul class="[ dropdown-menu ]" role="menu">--}}
                        {{--<li><a href="/register" class="[ animate ]">Sign Up as a Talent</a></li>--}}
                        {{--<li><a href="/register" class="[ animate ]">Sign Up as a Fan</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <li><a href="/register" class="[ animate ]">Sign Up as a Talent</a></li>
                <li><a class="animate" href="/login">Login</a></li>
                @endif
                <li class="[ hidden-xs ]"><a href="#toggle-search" class="[ animate ]"><span class="[ glyphicon glyphicon-search ]"></span></a></li>
            </ul>
        </div>
    </div>
    <div class="[ bootsnipp-search animate ]">
        <div class="[ container ]">
            <form action="/search" method="GET" role="search">
            {{ csrf_field() }}
                <div class="[ input-group ]">
                    <input type="text" class="[ form-control ]" name="search" placeholder="Search for Tracks, Videos, Pictures & Talents">
						<span class="[ input-group-btn ]">
							<button class="[ btn btn-primary ]" type="submit"><span class="[ glyphicon glyphicon-search ]"></span></button>
                            <button class="[ btn btn-danger ]" type="reset"><span class="[ glyphicon glyphicon-remove ]"></span></button>
						</span>
                </div>
            </form>
        </div>
    </div>
    @if ( Auth::check()  &&  ! Auth::user()->confirmed)
      <div class="bs-info" style="text-align:center">
            <div class="alert alert-info fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
               <p> <b>Note!</b> Please confirm your account before you begin/continue to upload files.
                Please click <a href="/confirm"><b>HERE</b></a> on how to</p>
             </div>
      </div>
   @endif

</nav>