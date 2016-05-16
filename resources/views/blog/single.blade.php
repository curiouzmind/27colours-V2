<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>Post Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- CSS Page Style -->    
    <link rel="stylesheet" href="{{ asset('css/pages/post-page.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">

    <!-- Custom CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('plugins/line-icons/line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl-carousel/owl.carousel.css') }}">
    <link href="{{ asset('plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="{{ asset('css/themes/default.css') }}" id="style_color">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>

</head>

<body id="page-top"  >

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- HEADER 1-->    
        <div class="container">
            <div class="row">
                <!-- HEADER 1 COLUMN 1 -->    
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a class="headmargintop logo navbar-brand navbar1-brand" href="#">
                    	<img class="img-responsive center-block" src="/img/logo.fw.png" alt="27 Colours"></a>
                </div>
                <!-- HEADER 1 COLUMN 2 -->    
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <a class="navbar-brand navbar1-brand" href="#">
                        	<img class="img-responsive center-block" src="/img/AD-space.fw.png" alt="AD Space"></a>
                </div>
            </div>
        </div>
        <!-- HEADER 2 -->    
        <div class="main-menu shadow-effect-1">
          <div class="row container center-block">
                    <!-- Brand and toggle get grouped for better mobile display -->
            <!-- HEADER 2 COLUMN 1 -->  
            <div class="vert-mid col-lg-8 col-sm-8 col-xs-8">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     <!-- MENU --> 
                    <div class="">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="{{action('BlogController@index')}}"><i class="fa fa-home fa-fw centered"></i> <span class="network-name"></span></a>
                            </li>
                            <li>
                                <a href="{{action('SongController@index')}}">Songs</a>
                            </li>
                            <li>
                                <a href="{{action('VideoController@index')}}">Videos</a>
                            </li>
                            <li>
                                <a href="{{action('GalleryController@index')}}">Gallery</a>
                            </li>
                            <li>
                                <a href="{{action('BlogController@index')}}">Blog</a>
                            </li>
                        </ul>
                    </div>
                     <!-- SOCIALS --> 
                    <div class="socials">
                        <ul class="socials list-inline">
                                    <li>
                                        <a href="" class=""><i class="fa fa-twitter fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="" class=""><i class="fa fa-facebook fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><i class="fa fa-youtube fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><i class="fa fa-soundcloud fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><i class="fa fa-instagram fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- HEADER 2 COLUMN 2 -->    
            <div class="col-sm-4 col-xs-4">
                     <!-- MENU --> 
                        <ul class="list-inline socials">
                            <li><a class="upload btn btn-default btn-file" href="#">
                                <span class="hidden-xs hidden-sm">Upload</span>
                                <input type="file" />
                                <i class="fa fa-upload fa-fw centered"></i></a>
                            </li>
                            <li>
                                <ul class="list-unstyled">
                                @if(Auth::check())
                                    <li>{{ HTML::linkRoute('logout', 'logout' )}} </li>

                                @else
                                <li>{{ HTML::linkRoute('register', 'Registration' )}}| {{ HTML::linkRoute('login', 'Sign In' )}}</li>
                                @endif
                                
                                </ul>
                            </li>
                        </ul>
            </div>
            
          </div>
        </div>
    </nav>
  <div class="wrapper">
    <!-- Header -->
    <!-- /.intro-header -->
    <header id="pp-header">
        <div class="container  page-intro">
            <h2>Discover music <i class="fa fa-music fa-fw"></i> from new talents</h2>
        </div>
    </header>

    <section id="post-page">
        <!-- CONTENT -->
        <div class="container">
            <div class="row blog-item">
                <!-- MAIN CONTENT COL-8 -->
                <section id="main-content" class="jumbotron col-lg-8">
                    <!-- CONTENT HEADER -->
                    <div class="pp-introtitle">
                    <h2 class="pull-left red">{{$blog->title }} </h2>
                        <div id="sharethis" class="">
                        <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                        <span class='st_facebook_hcount' displayText='Facebook'></span>
                        <span class='st_twitter_hcount' displayText='Tweet'></span>
                        <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                        </div>
                    </div>
                    <!-- ROW 1 - UPLOADER INFO & UTILITIES -->
                    <div class="row ">
                        <div class="blog-post-tags">
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="fa fa-calendar"></i> {{ $blog-> created_at}}</li>
                            <li><i class="fa fa-pencil"></i>{{ $blog->user->username}}</li>
                            <li><i class="fa fa-comments"></i> <a href="#">{{ $blog->comment_count}} Comments</a></li>
                            <li class="blog-tags">
                                <i class="fa fa-tags">Tags: </i> |</a>
                 
                            </li>
                        </ul>                                                
                        </div>
                    </div>
                    <hr>
                     <!-- ROW 2 - UPLOAD & DESCRIPTION -->
                    <div class="row">
                        <section class="">
                            <ul class="list-inline row container">
                            <li class="thumbnail">
                                <img class="albumart" src="/img/bg1-thumbnail.jpg">
                            </li> 
                            <li>
                                <ul class="list-unstyled">
                                    <!-- SONG TITLE & ARTIST -->
                                    <li class="pp-title"><h4>
                                        <span class="pp-title1">Anuofia</span>
                                        <span class="pp-title2"><a class="red" href="pp-artist">Ajaa</a></span></h4>
                                    </li>
                                    
                                    <!-- RATING -->
                                    <li>
                                    <div class="pp-rating">
                                            <div>
                                            <ul class="list-inline">
                                                    <li>User Rating :</li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                                    <li><a href="#"><i class="glyphicon glyphicon-star-empty"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                    <!-- PLAYER -->
                                    <li class="pp-player scplayer">
                                        <iframe width="100%" height="100%" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/175199197&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false">
                                        </iframe>
                                    </li> 
                                </ul>
                            </li>
                            </ul>   
                        </section>
                        <section class="content-desc">
                            <!-- DESCRIPTION -->
                            <div class="">
                            <h4 class="upload-desc"> Another hit banger from music producer Chopstix
                            </h4>
                            <p>
                                Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet consectetur adipiscing elit. Fusce condimentum eleifend enim a feugiatt non libero consectetur adipiscing elit magna. Sed et quam lacus. Condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat.
                            </p>
                            </div>
                        </section>
                    </div>
                    <hr>
                    <!-- SONG VIDEO -->
                    <div class="song-vid row">
                    </div>
                    <hr>
                    <!--  -->
                    <div class="row">
                        <!-- ADS -->
                        <div id="" class="banner google-ads col-12"></div>
                        <!-- TAGS -->
                        <div class="tags"></div>
                        <!-- ARTICLE INTERACTION -->
                        <div class="article-share"></div>
                        <!-- RELATED CONTENT -->
                        <div class="related-upld">
                            <div class="row">
                                <div class="">
                                <div>
                                    <h2 class="pull-left">Related Uploads</h2>
                                </div>
                                <div id="owl-demo">          
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>
                                  <div class="item"><img src="/img/bg1-thumbnail.jpg" alt="Owl Image"></div>                               
                                </div>
                                </div>
                            </div>
                            <!-- COMMENTS -->
                            <div class="comments">
                                <hr>
                                <!-- Recent Comments -->
                                <div class="media">
                                    <h3>Comments</h3>
                                    <a class="pull-left" href="#">
                                        <img class="small-thumbnail media-object" src="/img/bg1-thumbnail.jpg" alt="" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="">Celebrity Stalker</a> <span>5 hours ago / <a href="#">Reply</a></span></h4>
                                        <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>

                                        <hr>

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="/img/bg1-thumbnail.jpg" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Media heading <span>17 hours ago / <a href="#">Reply</a></span></h4>
                                                <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum anibhut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="/img/bg1-thumbnail.jpg" alt="" />
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">Media heading <span>2 days ago / <a href="#">Reply</a></span></h4>
                                                <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum anibhut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--/media-->

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="/img/bg1-thumbnail.jpg" alt="" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Media heading <span>July 5,2013 / <a href="#">Reply</a></span></h4>
                                        <p>Donec id elit non mi portas sats eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna..</p>
                                    </div>
                                </div><!--/media-->
                                <!-- End Recent Comments -->

                                <hr>

                                <!-- Comment Form -->
                                <div class="post-comment">
                                    <h3>Leave a Comment</h3>
                                    <form>
                                        <label>Name</label>
                                        <div class="row margin-bottom-20">
                                            <div class="col-md-7 col-md-offset-0">
                                                <input type="text" class="form-control">
                                            </div>                
                                        </div>
                                        
                                        <label>Email <span class="color-red">*</span></label>
                                        <div class="row margin-bottom-20">
                                            <div class="col-md-7 col-md-offset-0">
                                                <input type="text" class="form-control">
                                            </div>                
                                        </div>
                                        
                                        <label>Message</label>
                                        <div class="row margin-bottom-20">
                                            <div class="col-md-11 col-md-offset-0">
                                                <textarea class="form-control" rows="8"></textarea>
                                            </div>                
                                        </div>
                                        
                                        <p><button class="btn-u" type="submit">Send Message</button></p>
                                    </form>
                                </div>
                                <!-- End Comment Form -->
                            </div>
                        </div>
                    </div>
                </section>
                
                
            
<!-- SIDEBAR COL-4 -->
    <section id="sidebar" class="col col-lg-4 ">
                    <!-- Featured Uploads-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center">Featured</h3>
                        </div>
                        <div class="panel-body">
                            <a href="" class="pull-left thumbnail">
                                <img src="/img/bg1-thumbnail.jpg">
                            </a>
                            <div class="post-pdn">                               
                                    <!-- TITLE -->
                                    <a href="post-page.html"><h3 class="media-heading lead">TITLE</h3></a>
                                    <!-- DESCRIPTION -->
                                    <p class="text-left">Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                    </p>
                            </div>
                            <!-- SOCIALS -->
                            <p>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star-empty"></i></a></li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Views <span class="badge ">1,000</span></button>
                                            </li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Comments <span class="badge">56</span></button>
                                            </li>
                                        </ul>
                            </p>
                        </div>
                        <div class="panel-body">
                            <a href="" class="pull-left thumbnail">
                                <img src="/img/bg1-thumbnail.jpg">
                            </a>
                            <div class="post-pdn">                               
                                    <!-- TITLE -->
                                    <a href="post-page.html"><h3 class="media-heading lead">TITLE</h3></a>
                                    <!-- DESCRIPTION -->
                                    <p class="text-left">Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                    </p>
                            </div>
                            <!-- SOCIALS -->
                            <p>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star-empty"></i></a></li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Views <span class="badge ">1,000</span></button>
                                            </li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Comments <span class="badge">56</span></button>
                                            </li>
                                        </ul>
                            </p>
                        </div>
                        <div class="panel-body">
                            <a href="" class="pull-left thumbnail">
                                <img src="/img/bg1-thumbnail.jpg">
                            </a>
                            <div class="post-pdn">                               
                                    <!-- TITLE -->
                                    <a href="post-page.html"><h3 class="media-heading lead">TITLE</h3></a>
                                    <!-- DESCRIPTION -->
                                    <p class="text-left">Cras justo odio, dapibus ac facilisis in, egestas eget quam.
                                    </p>
                            </div>
                            <!-- SOCIALS -->
                            <p>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star-empty"></i></a></li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Views <span class="badge ">1,000</span></button>
                                            </li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Comments <span class="badge">56</span></button>
                                            </li>
                                        </ul>
                            </p>
                        </div>
                    </div>
                    <!-- Top 10 Uploads-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center">Top 10 Uploads</h3>
                        </div>
                        <div class="panel-body">
                           <a href="" class="pull-left thumbnail">
                                <img src="/img/bg1-thumbnail.jpg">
                            </a>
                                    <div class="post-pdn">                               
                                    <!-- TITLE -->
                                    <a href="post-page.html"><h3 class="media-heading lead">TITLE</h3></a>
                                    <!-- DESCRIPTION -->
                                    <p class="text-left">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit
                                    </p>
                                    </div>
                                    <!-- SOCIALS -->
                                    <p>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star-empty"></i></a></li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Views <span class="badge ">1,000</span></button>
                                            </li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Comments <span class="badge">56</span></button>
                                            </li>
                                        </ul>
                                    </p> 
                        </div>
                    </div>
                    <!--  Uploads-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center">All-time Uploads</h3>
                        </div>
                        <div class="panel-body">
                            <a href="" class="pull-left thumbnail">
                                <img src="/img/bg1-thumbnail.jpg">
                            </a>
                                    <div class="post-pdn">                               
                                    <!-- TITLE -->
                                    <a href="post-page.html"><h3 class="media-heading lead">TITLE</h3></a>
                                    <!-- DESCRIPTION -->
                                    <p class="text-left">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit
                                    </p>
                                    </div>
                                    <!-- SOCIALS -->
                                    <p>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star"></i></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-star-empty"></i></a></li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Views <span class="badge ">1,000</span></button>
                                            </li>
                                            <li><button class="btn btn-primary btn-sm" type="button">
                                                     Comments <span class="badge">56</span></button>
                                            </li>
                                        </ul>
                                    </p>
                        </div>
                    </div>
                </section>

</div>
@include('layout.footer')
    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!-- Script to Activate the Carousel -->
    <script>

    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });

    });
    </script>
</body>
</html>
