@extends('layout.master')
@section('title')
    <title>{{$gallery->caption ? $gallery->image : 'Caption this!'}} - {{$gallery->user->username}} | 27Colours</title>
@stop
@section('styles')
<style type="text/css">
        .liked,
        .liked .fa,
        .not-liked:hover,
        .not-liked .fa{
            color:#fff;
            background:#CB291F;

        }
        .not-liked,
        .not-liked .fa,
        .liked:hover,
        .liked:hover .fa
        {
            background:#9C0000;
            color:#fff;

        }
    </style>

@stop
@section('header')
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    @stop
    @section('content')
            <!-- page header -->
    <div class="page-banner well">
        <div class="overlay-bg text-center">
            <div class="container">
                <div class="thumbnail center-block" style="width: 100px; height: 100px;border-radius:50%;overflow: hidden;">
                    @if($gallery->image!=='')
                        {{HTML::image($gallery->image, $gallery->caption,array('class'=>'img-responsive center-block','width' => 'auto', 'height' => '100%'))}}
                    @else
                        {{HTML::image('img/user.jpg','thumbnail',array('width' => '100px', 'height' => '100px'))}}
                    @endif
                </div>
                <h2 class="text-uppercase bold"><i class="fa fa-camera-retro fa-fw"></i>
                    @if($gallery->caption!=='')
                        {{$gallery->caption}}
                    @else
                        Caption this !
                    @endif
                </h2>
                <h4 class="text-capitalize"><i class="fa fa-user fa-fw"></i> {{$gallery->user->username}}</h4>
            </div>
        </div>
    </div>
    <!-- posts -->
    <div class="">
        {{--categories nav-tabs bar --}}
        <div class="row categories-bar well">
            <div class="col-md-12">
                <div class="container">
                    <ul class="list-inline pull-right m5">
                     @if(Auth::guest())
                                         <a href="/gallery/like" type="submit" class="btn btn-border not-liked">
                                            <i class="fa fa-heart"></i> Like
                                            <span class="badge badge-inverse"> {{$gallery->likes->count()}}</span>
                                         </a>
                                    @endif
                    @if(Auth::check())
                    <li>                   
                    {{--*/ $userLike=App\Like::where(['likeable_id'=>$gallery->id,'user_id'=>Auth::id()])->first() /*--}}
        
                    <form id="likesForm" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="galleryID" name="gallery_id" value="{{$gallery->id}}">
                                <button type="submit" id="likeBtn" class="btn btn-border {{$userLike ? 'liked' : 'not-liked'}}">
                                 <i class="fa fa-heart"></i>
                                 {{ $userLike ? 'Unlike' : 'Like' }} 
                                    <span class="badge badge-inverse">
                                    {{$gallery->likes->count()}} </span></button>
                    </form>
                    </li>
                    @endif
                        <li>
                            <a data-placement="bottom" data-toggle="popover" data-container="body" data-placement="left" type="button"
                               data-html="true" href="#">Share <i class="fa fa-share-alt"></i>
                            </a>
                            <div id="popover-content" class="hide">
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_googleplus_large' displayText='Google +'></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                {{--image viewer--}}
                <div class="col-md-12 image-viewer">
                    <a type="button" data-toggle="modal" href="#myModal">
                        {{HTML::image($gallery->image, $gallery->caption,array('class'=>'img-responsive center-block','width' => 'auto', 'height' => '100%'))}}
                    </a>
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    {{ HTML::image($gallery->image, $gallery->caption, array('class' => 'center-block img-responsive', 'style'=>'width:100%; height:100%;')) }}</div>
                                <div class="modal-footer" style="padding:3px;"><h2 class="text-center"> {{$gallery->caption}}</h2></div>
                            </div>
                        </div>
                    </div>
                </div>
                <small>*click on or touch picture to enlarge.</small>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    {{--related pictures--}}
                    <h1 class="related-title">Related Pictures</h1>
                    <hr>
                    <div class="owl-carousel">
                        @foreach($reCats as $reCat)
                            <div class="item grid-thumbs">
                                <div class="thumbnail">
                                    @if($reCat->image!=='')
                                        {{HTML::image($reCat->image, $reCat->caption,array('class'=>'img-responsive group list-group-image'))}}
                                    @else
                                        {{HTML::image('img/user.PNG','thumbnail',array('class'=>'group list-group-image', 'style'=>'padding:10px;'))}}
                                    @endif
                                    <div class="caption">
                                        <h4 class="upload-title group inner list-group-item-heading text-uppercase">
                                            <i class="fa fa-camera-retro fa-fw"></i>
                                            @if($reCat->caption!=='')
                                                <a class="" href="{{ action('GalleryController@getShow', array('id'=> $reCat->id))}}">{{$reCat->caption}}</a>
                                            @else
                                                Caption this !
                                            @endif
                                        </h4>
                                        <p class="uploader text-uppercase"><i class="fa fa-user fa-fw"></i>
                                            <a class="" href="{{ action('ProfileController@getShow',
                                                array('id'=>$reCat->user->id))}}">{{$reCat->user->username}}</a>
                                        </p>
                                        <p class="clearfix"><span class="badge"><i class="fa fa-clock-o"></i> {{$reCat->timeago}}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--comments--}}
                    <div class="post-comments">
                        @include('discomment')
                    </div>
                </div>
                <div class="col-md-4">
                    {{--sidebar--}}
                    @include('gallery.gallery-sidebar')
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $("[data-toggle=popover]").popover({
            html: true,
            content: function() {
                return $('#popover-content').html();
            }
        });
    </script>
    <script type="text/javascript">

        $(document).ready(function() {
    $('#likesForm').submit(function() {
              var gallery_id= $('#galleryID').val();

              $.ajax({ url: "{{ URL::to('/gallery/process')}}",
                    data: {gallery_id: gallery_id},
                    dataType: 'json',
                    type: 'post',
                 success: function(output) {
                     $.each(output.data, function(){
                        if(this.id==0){
                            console.log(this.text);
                            $('#likeBtn').empty().html('<button id="likeBtn" type="submit" class="btn btn-border liked"><i class="fa fa-heart"></i>Like<span class="badge badge-inverse">' +this.count+ '</span></button>');
                      }

                        if(this.id==1){
                         console.log(this.text);
                      $('#likeBtn').empty().html('<button id="likeBtn" type="submit" class="btn btn-border not-liked"><i class="fa fa-heart"></i>Unlike <span class="badge badge-inverse">' + this.count + '</span></button>');
                      }

                  });

                         }
                });

               return false;
                }); // end submit()
});
    </script>
@stop