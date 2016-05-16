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
                <h2>Add Your Songs</h2>
                              <h6 class="red">Maximum 10 Uploads (Add Your Best)</h6>           
                        <hr> 
                            @if (Session::get('errors'))

                <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a>
                </div>
                @endif

                @if (Session::get('notices'))
             <div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a>
             </div>
               @endif

            {{Form::open( array('url' => '/song/create', 'files'=> true, 'method'=>'post')) }}
                    <h4>{{Form::label('music','Upload Mp3 From your Computer') }}</h4> 

                     <!-- <i class ="fa">{{ Form::file('music', array('class'=>'btn btn-u btn-file btn-file-inverse')) }}</i>
                            <div class="heading upld-section-seprtr"><h3>OR</h3></div> -->

                            <h4>Embed Your  Link Below To Upload</h4>                                                                    
                                      <!-- upload soundcloud -->
                                     <div class="margin-bottom-20 input-group center-block">
                                        {{ Form::label('soundcloud','Add SoundCloud Link', array('class'=>'btn btn-u btn-file btn-file-inverse'))}}
                                        <i class="input-group-addon fa fa-soundcloud">
                                            {{Form::text('soundcloud', 'Soundcloud Url')}}
                                                </i>
                                     </div>
                                        <hr>
                                
                                    <h4>Add YouTube Link For Your Song's Video (Optional)</h4>
                                       <div class="margin-bottom-20  input-group center-block">
                                            {{Form::label('youtube','Add Youtube Link', array('class'=>'btn btn-u btn-file btn-file-inverse'))}}
                                            <i class="input-group-addon fa fa-youtube">
                                            {{Form::text('youtube', 'YouTube Url')}} </i>
                                         </div>
                                    <h4 class="btn btn-u btn-file btn-file-inverse"> Add Song Description(Required)</h4>
                                        <div class="margin-bottom-20 input-group center-block">
                                            {{Form::textarea('description','Enter your description here')}}
                                            
                                         </div>

                                                                                                                                                      
                            <h4>Song Details</h4>
                            
                            <div class="margin-bottom-20"> 
                            {{Form::label('title','Enter title',array('class'=>'btn btn-u btn-file btn-file-inverse'))}}
                            <i class="fa"> {{Form::text('title','Enter Title (Required)')}}</i>
                             
                            </div>
                            
                            <div class="upld-imgbdrght col-sm-6">
                                <label for="upld-img" class="control-label">Album Art (Optional)</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width:200px; height:200px;">{{ HTML::image('img/user.jpg','Album Art')}}</div>
                                    <div><span class="btn btn-u btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                         {{Form::file('song_image')}}
                                        </span><a href="#" class="btn btn-u fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    </div> 
                                </div>
                                <div class="upld-tagcol col-sm-6">
                                    <ul class="list-unstyled ">
                                        <li>
                                        <label for="upld-tags" class="control-label">Tags <i class="icon-prepend glyphicon glyphicon-tags"></i></label>
                                        </li>
                                        <li>
                                            {{Form::textarea('tags', 'Enter Tags')}}
                                        
                                        </li>
                                    </ul>
                                    <ul class="list-unstyled select">
                                        <select name="genre">
                                       <option value="rap">Hip hop</option>
                                        <option value="rock">Rock</option>
                                         <option value="country">Country</option>
                                         <option value="soul">Soul</option>
                                         <option value="reggae">Reggae</option>
                                        </select> 
                                            </li>
                                    </ul>
                                </div>
                           
                           {{Form::submit('Submit', array('class'=>'btn btn-u btn-file btn-file-inverse')) }}                                
                         {{Form::close() }}

                         </section>   

                    </div>
                </div>
                    
                          
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
