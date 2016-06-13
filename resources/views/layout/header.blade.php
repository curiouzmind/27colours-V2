<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- seo -->
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="singing,photoshoot,modelling,talent search">
    <meta name="author" content="curiouzmindTech">

    @yield('tags')

    <!-- core css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <!-- plugins css -->

    <!-- plugins folder -->
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.transition.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/AudioPlayer/css/audioplayer.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/videoplayer/video.css')}}">
    <link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
    <!-- css folder -->
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/themes/jackedup.css')}}" media="screen"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/selectize.css')}}"/> -->
    <!-- custom global css -->
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Dosis:500,300,700,400' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
    @yield('css-links')
    @yield('header')
    <!-- Sharing plugin -->
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options(
                {publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false,
                    doNotCopy: false, hashAddressBar: true, displayText: "27Colours"});
    </script>
</head>

