<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Upload Songs | 27 Colours</title>

    <!-- Custom Page CSS -->    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet" media="screen">     

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/upload-page.css') }}">
    <link href="{{ asset('css/main.css" rel="stylesheet') }}">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">    
    
    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="upldsong-page">

    <section class="content">
        <!-- CONTENT -->
        <div class="upld-block">
            <div class="row ">              
                <section id="" class="profile-body">
                    <!-- TAB NAV -->
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active"><a href="#songs" role="tab" data-toggle="tab">Upload Songs</a></li>
                        <li><a href="#songdetails" role="tab" data-toggle="tab">Add Song Details</a></li>
                    </ul>
                    <!-- TAB CONTENT -->
                    <div class="tab-content post-thread">
                        <!-- SONGS -->
                        <div id="songs" class="tab-pane active fade in">
                            <!-- upload block header start -->
                            <ul class="upld-block-header list-unstyled">
                                <li><h2>Add Your Songs</h2></li>
                                <li><h6 class="red">Maximum 10 Uploads (Add Your Best)</h6></li>            
                            </ul>
                            <hr> 

                            <!-- upload section start -->
                            <form action="{{action('SongController@postCreate') }}" method="post" role ="form"
                             enctype="multipart/form-data"> 
                            <div id="upld-section" class="col-12 text-center">
                                <h3>Upload From Computer</h3>
                                <div class="upld-comp">                
                                    <a class="btn btn-u btn-file btn-file-inverse"  placeholder="Add Music">
                                        <i class ="fa fa-upload"> Upload <input type="file"> </i></a>
                                </div>
                                <!-- separator -->
                                <div class="heading upld-section-seprtr"><h2>OR</h2></div>         
                                <!-- separator end -->
                                <h4>Embed Your <i class="fa fa-soundcloud"></i> Link Below To Upload</i></h4>
                            
                                <div class="text-center">
                                    <div class="">
                                        <!-- upload soundcloud -->
                                        <div class="margin-bottom-20 input-group center-block">
                                            <ul class="list-inline">
                                            <li>
                                                <i class="input-group-addon fa fa-soundcloud">
                                                </i><input type="text" name="soundcloud" class="" placeholder="Soundcloud Url">
                                            </li>
                                            <li>
                                                <label for="soundcloud"> Add SoundCloud Link</label>                      
                                            </li>
                                            </ul>
                                        </div>
                                        <hr>
                                        <!-- upload youtube -->
                                    <h4>Add YouTube Link For Your Song's Video (Optional)</h4>
                                        <div class="margin-bottom-20  input-group center-block">
                                            <ul class="list-inline">
                                            <li class="input-group margin-bottom-20">
                                                <i class="input-group-addon fa fa-youtube"></i><input type="text" class="" placeholder="YouTube Url">
                                            </li>
                                            <li class="">
                                                <label for="youtube"> Add YouTube Link</label> 
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <!-- upload section ends -->
                            <!-- PAGER -->
                            <div class="pager">                                
                                    <button class="btn-u"><a href="#songdetails">Next</a></button>
                            </div>
                        </div>
                        <!-- UPLOAD DETAILS -->
                        <div id="songdetails" class="tab-pane fade in">
                            <!-- upload details start -->
                            <h2>Upload Details</h2>
                            <div class="margin-bottom-20 sky-form upld-details col-12">
                            <div class="row margin-bottom-20">
                                <label for="upld-title" class="control-label">Title</label>
                                <input type="text" class="form-control" id="title" name='title' placeholder="Enter Title (Required)">
                            </div>
                            <div class="row">
                                <div class="upld-imgbdrght col-sm-6">
                                    <label for="upld-img" class="control-label">Album Art (Optional)</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;"> {{HTML::image('img/user.jpg','Album Art')}}</div>
                                        <div><span class="btn btn-u btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="image"></span>
                                        <a href="#" class="btn btn-u fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div> 
                                </div>
                                <div class="upld-tagcol col-sm-6">
                                    <ul class="list-unstyled ">
                                        <li>
                                        <label for="upld-tags" class="control-label">Tags <i class="icon-prepend glyphicon glyphicon-tags"></i></label>
                                        </li>
                                        <li>
                                            <textarea placeholder="Type Tags For Your Upload Here Separated With Commas" class="" rows="3"></textarea>
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled select">
                                        <li><h3>Genre</h3></li>
                                        <li><select class="form-control">
                                            <option value="0" disabled>Genre</option>
                                            <option value="1">Highlife</option>
                                            <option value="2">Hip-Hop</option>
                                            <option value="3">RnB</option>
                                            <option value="4">Afrobeats</option>
                                        </select></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- PAGER -->
                            <nav>
                                <ul class="pager">
                                    <li class="previous"><a href="#">Previous</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </nav>
                        
                        </div>
                </section>            
            </div>
        </div>
    </section>

   
<!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>
    <!-- JS Global Compulsory -->           

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>

<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>

</html>
