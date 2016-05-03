<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile Picture | 27Colours</title>
    <!-- seo -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="singing, photoshoot,modelling,talent search">
    <meta name="author" content="curiouzmindTech">
    <!-- core css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <!-- plugins css -->
    <meta property="og:title" content="@yield('title')"/>
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="http://27colours.com/img/logo.png"/>

    <!-- custom global css -->
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/jackedup.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Dosis:500,300,700,400' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="padding-top:0;">
<nav class="navbar navbar-default" role="navigation" style="margin: 0;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="27Colours" height=40px width="auto">
            </a>
        </div>
    </div>
</nav>
<div class="login" style="min-height: 500px">
    <div class="auth-overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><span class="fa fa-camera"></span> Update Profile Picture</h3>
                            @if (Session::get('error'))
                                <div class="alert alert-error alert-danger m0" role="alert">{{{ Session::get('error') }}}</div>
                            @endif
                            @if (Session::get('notice'))
                                <div class="alert alert-info m0"  role="alert">{{{ Session::get('notice') }}}</div>
                            @endif
                        </div>
                        <div class="panel-body" style="min-height:300px;">
                            <div id="uploader" class="row">
                                <div class="col-md-6">
                                    <div id="crop-preview" style="margin-bottom:10px;">
                                        {{ HTML::image('img/user.png','Album Art',
                                        array('width'=>'auto', 'height'=>'250px'))}}
                                    </div>
                                    <div class="js-upload" style="display: none">
                                        <div class="progress" style="margin-bottom:0;">
                                            <div class="js-progress progress-bar progress-bar-info"></div>
                                        </div>
                                        <span class="btn-txt">Uploading (<span class="js-size"></span>)</span>
                                    </div>
                                    <div class="js-browse btn btn-default">
                                        <span class="btn-txt">Browse</span>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="hidden" id="js-preview"></div>
                                    <div class="form-group" style="display: none">
                                        <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                    </div>
                                </div>
                            </div> <!-- row ends -->
                            <div id="results"></div>
                        </div> <!-- panel body ends -->
                        <div class="panel-footer">
                            <button class="js-send btn btn-success" type="submit">Upload</button>
                            <a href="/profile" class="btn btn-default" type="button">back to profile</a>
                        </div> <!-- panel-footer ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center footer2">
                <ul class="list-inline socials">
                    <li><a class="btn btn-facebook" href="https://www.facebook.com/27colours" target="blank"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="btn btn-twitter" href="https://twitter.com/27colours" target="blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="btn btn-facebook" href="https://instagram.com/27colours/" target="blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
                <p>Copyright &copy;
                    <script type="text/javascript">
                        var currentYr = new Date();
                        var insertYr = currentYr.getFullYear();
                        document.write(insertYr);
                    </script>,
                    27Colours - All Rights Reserved.
                </p>
            </div>
        </div>
    </div> <!-- ./ container -->
</footer>
    <!-- jQuery Version 2.1.3 -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/humane.min.js') }}"></script>
    <script>
        window.FileAPI = {
            debug: false, // enable/disable debug mode (default is false),
            cors: false, // if using CORS, set this to `true`
            media: false, // if uploading directly from WebCam, set to `true`
            staticPath: '/js/FileAPI/', // path to '*.swf' files necessary for fallbacks
        };
    </script>
    <script type="text/javascript" src="{{asset('js/FileAPI/FileAPI.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/FileAPI/FileAPI.exif.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.fileapi.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jcrop/jquery.Jcrop.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.uploadPreview.min.js') }}"></script>
    <script>
        $(function() {
            // Enable FileAPI library on the uploader element
            $('#uploader').fileapi({
                multiple: false,
                maxSize : 4*1024*1024,
                //data: {"id": $("#id").val() },
                accept: '.jpeg, .jpg, .gif, .png',
                imageSize: {minWidth: 400, minHeight: 500 },
                // imageSize: {minWidth: 800, minHeight: 600, maxWidth: 600, maxHeight: 700 },
                url: 'create2', // The URL of the backend receiving the file uploads
                //autoUpload: false, // Upload the file when the user selects it from browse window
                // accept: 'image/*', // only allow images to be selected
                //data:{caption:'This is cool'},
                onComplete: function (evt, uiEvt){
                    var result = '';
                    var file = uiEvt.file;
                    var json = uiEvt.result;
                    if (json.error) {
                        humane.log(json.error,{ addnCls: 'humane-jackedup-error'});
                    } else {
                        humane.log(json.success,{ addnCls: 'humane-jackedup-success'});
                    }
                    setTimeout(function(){
                        window.location = json.url;
                    }, 3000);
                },
                elements: {
                    progress: '.js-progress',
                    active: { show: '.js-upload', hide: '.js-browse' },
                    size: '.js-size',
                    preview: {
                        el: '#js-preview', // specify which element should serve as a preview
                        width:150, // specify the width of the preview image
                        height: 200 // specify the height of the preview image
                    },
                    ctrl: { upload: '.js-send', reset: '.js-reset' },
                    empty: { hide: '.js-upload' }
                },
                onSelect: function (evt, data){
                    data.all; // All files
                    data.files; // Correct files
                    if( data.other.length ){
                        // there were errors
                        var errors = data.other[0].errors;
                        if( errors ){
                            // Show an error if the file is bigger than the limit
                            if(errors.maxSize) humane.log("The file is too big, Max size is 4MB", { addnCls: 'humane-jackedup-error' });
                            // errors.maxFiles;
                            if(errors.minWidth) humane.log("Minimum Image width should be 400px", { addnCls: 'humane-jackedup-error' });
                            if(errors.minHeight)humane.log("Minimum Image height should be 500px", { addnCls: 'humane-jackedup-error' });
                            // errors.maxWidth;
                            // errors.maxHeight;
                        }
                    }
                    var file = data.files[0]; // Select the file
                    if( !FileAPI.support.transform ) {
                        alert('Sorry, your browser does not support cropping');
                    }
                    // Only if the image is valid, crop it
                    if( file ){
                        $('#crop-preview').show(); // Show the cropper element
                        // Upload cropped image when "Send" button is pressed
                        $('.js-send')
                                .unbind('fileapi')
                                .bind('click.fileapi', function (){
                                    $('#crop-preview').hide();
                                    $('#uploader').fileapi('upload');
                                });

                        $('#crop-preview').cropper({
                            file: file, // Use the selected image
                            bgColor: '#fff',
                            maxSize: [$('#crop-preview').width()], // Make the cropper fit inside the preview
                            onSelect: function (coords){
                                $('#uploader').fileapi('crop', file, coords);
                            }
                        });
                    }
                }
            });
        });
    </script>
    <script>
        // Change global options for all Humane.js notifications
        humane.clickToClose = true;
        humane.addnCls = 'myNotification'; // Add a class to all notifications
        // Show an example notification
        //humane.log("Humane.js is ready for your command!");
    </script>
</body>
</html>