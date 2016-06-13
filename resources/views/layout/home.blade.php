@extends('layout.master')
    @section('title')
    Home -27Colours
@endsection
@section('description')
    Best talent manager anywhere,anyhow.
@endsection
    @section('styles')
        <style>
            body {padding-top:0 !important;}
            .badge .fa{
                color: #9C0000;
             }
        </style>
    @stop
    @section('content')
        <!-- carousel full/page-height -->
        <section>
            <!-- Banner Slider -->
          <div id="banner" class="home-slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="container">
                            <h1 class="text-uppercase">Music</h1>
                            <h4 class="text-uppercase">Discover hot new and banging tracks. </h4>
                            <a href="/song" class="action-button">Explore Tracks</a>
                        </div>
                    </li> <!-- end slide 1 -->
                    <li>
                        <div class="container">
                            <h1 class="text-uppercase">Videos</h1>
                            <h4 class="text-uppercase">watch trending and viral music videos, comedy and dance skits. </h4>
                            <a href="/video" class="action-button">Explore Videos</a>
                        </div>
                    </li> <!-- end slide 2 -->
                    <li>
                        <div class="container">
                            <h1 class="text-uppercase">Pictures</h1>
                            <h4 class="text-uppercase">View model pictures, selfies, event pictures, celebrity paparazzi pictures and more. </h4>
                            <a href="/gallery" class="action-button">Explore Pictures</a>
                        </div>
                    </li> <!-- end slide 3 -->
                    <li>
                        <div class="container">
                            <h1 class="text-uppercase">Talents</h1>
                            <h4 class="text-uppercase">See profiles of new talents in the entertainment industry.</h4>
                            <a href="/talent" class="action-button">Explore Talents</a>
                        </div>
                    </li> <!-- end slide 4 -->
                </ul>
                <a class="d" href="#featured-tracks">
                    <div class="a"></div>
                </a>
            </div>
          </div>
        </section>
        <!-- tracks -->
        <section id="featured-tracks" class="featured-posts section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h1 class="bold section-title">Featured Best Tracks</h1>
                        <h4 class="section-sub">New track list</h4>
                        <hr>
                        <div class="" id="songs">
                            {{--<div class="well well-sm">--}}
                                {{--<strong>Display</strong>--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list"></span>List</a>--}}
                                    {{--<a href="#" id="grid" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th"></span>Grid</a>--}}
                                {{--</div>--}}
                                {{--<span class="pull-right"><a href="/song" class="btn btn-danger btn-sm">View All</a></span>--}}
                            {{--</div>--}}
                            @include('partials.song')
                        </div>
                        <div class="text-center">
                            <span><a href="/song" class="btn btn-danger btn-md text-uppercase">View All Tracks</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- videos -->
        <section class="featured-posts section-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h1 class="bold section-title">New Videos</h1>
                        <h4 class="section-sub">Watch Now</h4>
                        <hr class="hr-white clearfix">
                        <div class="" id="videos">
                            @include('partials.video')
                        </div>
                        <div class="text-center">
                            <span><a href="/video" class="btn btn-danger btn-md text-uppercase">View All Videos</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- gallery -->
        <section class="featured-posts section-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h1 class="bold section-title">Recent Pictures</h1>
                        <h4 class="section-sub">view pictures of models and selfy moments</h4>
                        <hr>
                        <div class="gallery">@include('partials.gallery')</div>
                        <div class="text-center">
                            <span><a href="/gallery" class="btn btn-danger btn-md text-uppercase">View All Pictures</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <!-- talents -->
        <section class="featured-posts section-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h1 class="bold section-title">New Talents</h1>
                        <h4 class="section-sub">Newly added talents.</h4>
                        <hr class="hr-white clearfix">
                        <div class="gallery">@include('partials.talent')</div>
                        <div class="text-center">
                            <span><a href="/talents" class="btn btn-danger btn-md text-uppercase">View All Talents</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @stop
    @section('scripts')
        <script>
         $(document).ready(function() {
             $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');$('#products .item').removeClass('grid-group-item');});
             $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
         });
     </script>
    @stop