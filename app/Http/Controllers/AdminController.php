<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Song;
use App\Video;
use App\Gallery;
use App\Talent;
use App\User;
use App\Tag;
use View;
use Response;

class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('admin');
    }

    //    Admin controllers
    public function getIndex()
    {
        $songs = Song::all();
        $tags = Tag::lists('name', 'id');
        $videos= Video::all();
        $galleries = Gallery::all();
        $talents = User::all();

        return View::make('admin.dashboard')
            ->with('songs', $songs)
            ->with('galleries', $galleries)
            ->with('videos', $videos)
            ->with('tags',$tags)
            ->with('talents', $talents);
    }

    public function getAdminUsers()
    {
        $talents = User::all();

        return View::make('admin.users.blade.php', ['talents', $talents]);
    }
}
