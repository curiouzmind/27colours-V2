<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')
    <!-- seo -->
     <meta name="description" content="@yield('description')">
    <meta name="keywords" content="singing, photoshoot,modelling,talent search">
    <meta name="author" content="curiouzmindTech">
    <!-- plugins css -->

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="http://27colours.com/img/logo.png">
    <!-- plugins folder -->
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/owl.transition.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/AudioPlayer/css/audioplayer.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/videoplayer/video.css')}}">
    <link rel="stylesheet" href="{{asset('js/jcrop/jquery.Jcrop.min.css')}}" type="text/css" media="screen">
    <!-- css folder -->
    <link rel="stylesheet" href="{{asset('css/all.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis:400,300,500,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('header')
</head>

