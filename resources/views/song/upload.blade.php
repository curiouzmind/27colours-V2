<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload a Track | 27Colours</title>
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
    <link rel="stylesheet" href="{{asset('css/fileinput.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
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
                <div class="col-md-6 col-md-offset-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center"><span class="fa fa-file-audio-o"></span> Add a track</h3>
                            @if (Session::get('errors'))
                                <div class="alert alert-error alert-danger m0" role="alert">{{{ Session::get('errors') }}}</div>
                            @endif
                            @if (Session::get('notices'))
                                <div class="alert alert-info m0"  role="alert">{{{ Session::get('notices') }}}</div>
                            @endif
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                        <p>Add Track</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                        <p>Add track info</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                        <p>Album Art / Youtube link (Optional) </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" style="min-height:300px;">
                            <form role="form" id="song-upload" method="post" enctype="multipart/form-data" action="create2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row setup-content" id="step-1">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3 class="text-center text-uppercase"> Add Track</h3>
                                            <hr class="p5">
                                            <div class="form-group m0">
                                                <label class="control-label">Upload from device/desktop</label>
                                                <input required="required" class="form-control" id="song" name="song" type="file" accept="audio/*"/>
                                                <small class="help-block">*Required | *Maximum of 10 uploads | *Only Mp3 formats allowed</small>
                                            </div>
                                            <hr>
                                            <button class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3 class="text-center text-uppercase"> Add Track Info</h3>
                                            <hr class="p5">
                                            <div class="form-group">
                                                <label class="control-label">Enter Song Title</label>
                                                <input required="required" type="text" class="form-control" id="title"
                                                       name="title" placeholder="Enter Song Title"/>
                                                <small class="help-block">*Required</small>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Song Description</label>
                                                <input type="text" class="form-control" id="decription"
                                                       name="description" placeholder="Enter Song description"/>
                                                <small class="help-block">optional</small>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Select Track Genre</label>
                                                <select class="form-control" name="genre" id="genre" required="required">
                                                    <option>Afrobeat</option>
                                                    <option>Gospel</option>
                                                    <option>RnB</option>
                                                    <option>Hip-hop</option>
                                                    <option>highlife</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>
                                            <hr>
                                            <button class="btn btn-default prevBtn btn-md pull-left" type="button" >Prev</button>
                                            <button class="btn btn-primary nextBtn btn-md pull-right" type="button" >Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3 class="text-center text-uppercase"> Album Art / Youtube link (Optional)</h3>
                                            <hr class="p5">
                                            <div class="form-group">
                                                <label for="image" class="control-label">Album Art</label>
                                                <input id="image" class="form-control" type="file" name="image"  accept="image/*"/>
                                                <small class="help-block">*Required</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="youtube" class="control-label">Youtube Video Link</label>
                                                <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Youtube Video"/>
                                                <p class="help-block">Add YouTube Link For Music Video (Optional)</p>
                                            </div>
                                            <hr>
                                            <button class="btn btn-default prevBtn btn-md pull-left" type="button" >Prev</button>
                                            <button class="btn btn-success btn-md pull-right" type="submit" id="submit-btn" value="Upload">Upload!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <span class="badge text-left"><a class="btn btn-default" href="/profile">back to profile</a></span>
                        </div>
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
<script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/fileinput.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#song").fileinput({
            //  uploadUrl: "create3" // your upload server url
            showUpload: false,
            //  uploadExtraData: function() {
            //    return {
            //        userid: $("#userid").val(),
            //        username: $("#username").val()
            //      };
            //   }
        });

        $("#image").fileinput({
            showUpload: false,
        });
    });
</script>
<script>
    $(document).ready(function () {
        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                allPrevBtn = $('.prevBtn');
        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                    $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

            $(".form-group").removeClass("has-error");
            for(var i=0; i<curInputs.length; i++){
                if (!curInputs[i].validity.valid){
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        allPrevBtn.click(function(){
            var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

            $(".form-group").removeClass("has-error");
            prevStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>
</body>
</html>