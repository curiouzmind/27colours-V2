<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header p010">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand p50" href="/">
            <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="27Colours">
        </a>
    </div>
    <!-- /.navbar-header -->

    <!-- navigation -->
    <ul class="nav navbar-nav navbar-left">
        <li><a href="/" class="">View Site</a></li>
    </ul>
    <ul class="nav navbar-top-links navbar-right">
        <li class="[ dropdown ]">
            <a href="#" class="[ dropdown-toggle ][ animate ]" data-toggle="dropdown">Admin Pages <span class="[ caret ]"></span></a>
            <ul class="[ dropdown-menu ]" role="menu">
                <li><a href="/admin" class="[ animate ]">Dashboard <span class="[ pull-right fa fa-dashboard ]"></span></a></li>
                <li><a href="/admin/users" class="[ animate ]">Users <span class="[ pull-right fa fa-users ]"></span></a></li>
            </ul>
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
                    <li><a href="#">
                            Settings <span class="[ pull-right fa fa-gear fa-fw ]"></span></a>
                    </li>
                    <li role="separator" class="divider"></li>
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
                    <li><a href="{{action('UsersController@getLogout')}}" class="[ animate ]">
                            Logout  <span class="[ pull-right glyphicon glyphicon-off ]"></span></a>
                    </li>
                </ul>
            </li>
        @else
            <li><a href="/users/register" class="[ animate ]">Sign Up as a Talent</a></li>
            <li><a class="animate" href="/users/login">Login</a></li>
        @endif
    </ul>
    <!-- /.navbar-top-links -->
    @include('admin.include.sidebar')
</nav>