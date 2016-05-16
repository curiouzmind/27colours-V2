<?php

namespace App\Providers;
use App\Song;
use App\Video;
use App\Gallery;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function($view)
        {
             $view->recentSongs = Song::take(4)->orderBy('id','desc')->get();
             $view->profileSongs = Song::take(3)->orderBy('id','desc')->get();
             $view->recentVideos = Video::take(4)->orderBy('id','desc')->get();
             $view->profileVideos = Video::take(3)->orderBy('id','desc')->get();
             $view->recentGalleries = Gallery::take(4)->orderBy('id','desc')->get();
             $view->profileGalleries = Gallery::take(3)->orderBy('id','desc')->get();
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
