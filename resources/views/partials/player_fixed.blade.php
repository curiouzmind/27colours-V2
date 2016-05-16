<div class="sm2-bar-ui compact full-width fixed playlist-open">
    <div class="bd sm2-main-controls">
        <div class="sm2-inline-texture"></div>
        <div class="sm2-inline-gradient"></div>
        <div class="sm2-inline-element sm2-button-element">
            <div class="sm2-button-bd">
                <a href="#play" class="sm2-inline-button play-pause">Play / pause</a>
            </div>
        </div>
        <div class="sm2-inline-element sm2-inline-status">
            <div class="sm2-playlist">
                <div class="sm2-playlist-target">
                    <!-- playlist <ul> + <li> markup will be injected here -->
                    <!-- if you want default / non-JS content, you can put that here. -->
                    <noscript><p>JavaScript is required.</p></noscript>
                </div>
            </div>
            <div class="sm2-progress">
                <div class="sm2-row">
                    <div class="sm2-inline-time">0:00</div>
                    <div class="sm2-progress-bd">
                        <div class="sm2-progress-track">
                            <div class="sm2-progress-bar"></div>
                            <div class="sm2-progress-ball"><div class="icon-overlay"></div></div>
                        </div>
                    </div>
                    <div class="sm2-inline-duration">0:00</div>
                </div>
            </div>
        </div>
        <div class="sm2-inline-element sm2-button-element sm2-volume">
            <div class="sm2-button-bd">
                <span class="sm2-inline-button sm2-volume-control volume-shade"></span>
                <a href="#volume" class="sm2-inline-button sm2-volume-control">volume</a>
            </div>
        </div>
        <div class="sm2-inline-element sm2-button-element">
            <div class="sm2-button-bd">
                <a href="#repeat" title="Repeat track" class="sm2-inline-button repeat">&infin; repeat</a>
            </div>
        </div>
        <div class="sm2-inline-element sm2-button-element sm2-menu">
            <div class="sm2-button-bd">
                <a href="#menu" class="sm2-inline-button menu">menu</a>
            </div>
        </div>
    </div>
    <div class="bd sm2-playlist-drawer sm2-element">
        <div class="sm2-inline-texture">
            <div class="sm2-box-shadow"></div>
        </div>
        <!-- playlist content is mirrored here -->
        <div class="sm2-playlist-wrapper">
            <ul class="sm2-playlist-bd">
                <!-- item with "download" link -->
                @foreach($reSongs as $song)
                    <li>
                        <div class="sm2-col sm2-wide">
                            <a class="text-capitalize" href="{{asset($song->song)}}"><b>{{$song->title}}</b> - {{$song->user->username}}
                                <span class="label">{{$song->genre}}</span></a>
                        </div>
                        <div class="sm2-col">
                            <a href="{{asset($song->song)}}" download="download" title="Download &quot;{{$song->title}}&quot;"
                               class="sm2-icon sm2-music sm2-exclude">Download this track</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>