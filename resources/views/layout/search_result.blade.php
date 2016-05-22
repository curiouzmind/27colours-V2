@extends('layout.master')
    @section('title')
        <title>Home | 27Colours</title>
    @stop
    @section('description')
        Looking for the next singing, dancing and modelling talents
    @stop
    @section('styles')
        <style>
            body {padding-top:0 !important;}
        </style>
    @stop
    @section('content')
        <!-- carousel full/page-height -->
        <div class="clearfix"></div>
        @if($songs->count() >= 1)
        <!-- tracks -->
        <section id="featured-tracks" class="featured-posts section-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h4 class="section-sub">Search Result For Songs</h4>
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
                        
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        @endif
        <!-- videos -->
        @if( $videos->count() >= 1)
            <section class="featured-posts section-3">
                <div class="container">
                     <div class="row">
                        <div class="col-md-12">
                        <!-- featured songs -->                           
                            <h4 class="section-sub">Search Result for Videos</h4>
                            <hr class="hr-white clearfix">
                            <div class="" id="videos">
                        
                                 @include('partials.video')
                         
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
        @endif
        
        <!-- gallery -->
        @if($galleries->count() >=1 )
        <section class="featured-posts section-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h4 class="section-sub">Search result for galleries</h4>
                        <hr>
                        <div class="gallery">@include('partials.gallery')</div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        @endif
        <!-- talents -->
        @if($talents->count() >= 1)
        <section class="featured-posts section-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- featured songs -->
                        <h4 class="section-sub">Search Results for users.</h4>
                        <hr class="hr-white clearfix">
                        <div class="gallery">@include('partials.talent')</div>
                    
                    </div>
                </div>
            </div>
        </section>
        @endif

         @if( $songs->count() === 0 && $videos->count() === 0 && $galleries->count() === 0 && $talents->count() === 0)
         
                <div class="row">
                    <h1 class="bold section-title" style="height:300px">No search result found for keywords {{ $term}}</h1>
                </div>
    
        
         @endif

    @stop
    @section('scripts')
        <script>
         $(document).ready(function() {
             $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');$('#products .item').removeClass('grid-group-item');});
             $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
         });
     </script>
    @stop