<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //    Admin controllers
    public function getAdmin()
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
