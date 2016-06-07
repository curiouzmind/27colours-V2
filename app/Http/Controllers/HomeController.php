<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Song;
use App\Video;
use App\Gallery;
use App\Talent;
use App\User;
use App\Tag;
use App\Like;
use View;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
   // {
    //    $this->middleware('auth');
   // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
  {    
    //if (\App::environment('production', 'staging'))
     // {
     //   echo "environment=", \App::environment(), "\n";
     // }
   // else
     // {
      //  echo "environment=", \App::environment(), "\n";
     // }

         $songs = Song::orderBy('id','desc')->paginate(4);
        $videos= Video::orderBy('id', 'desc')->paginate(3);
        $galleries = Gallery::orderBY('id', 'desc')->paginate(8);
        $talents = User::orderBY('created_at', 'desc')
            ->whereNotNull('talents')
            ->paginate(15);

  if (\Request::ajax()) {
      $content= ['songs' => $songs, 'videos'=> $videos,'galleries'=> $galleries, 'talents'=>'$talents'];
             return Response::json($content, 200);
         }

     return View::make('layout.home')
     ->with('songs', $songs)
     ->with('videos', $videos)
         ->with('galleries', $galleries)
        ->with('talents', $talents);

  }

    public function getPosts()
  {
  $songs = Song::orderBy('id','desc')->paginate(4);
  $videos= Video::orderBy('id', 'desc')->paginate(4);
  $galleries = Gallery::orderBy('id', 'desc')->paginate(4);
    $talents = Talent::orderBY('id', 'desc')->paginate(6);
          if (Request::ajax())
           {
                //$content= ['galleries' => $galleries];
                // return Response::json($content, 200);
             return Response::json(View::make('partials.gallery', array('galleries' => $galleries, 'songs'=>$songs, 'videos'=>$videos, 'talents'=>$talents ))->render());
           }
   }

   public function getSong()
    {
        $songs =    Song::orderBy('id','desc')->take(8)->get();
        $afrobeats= Song::where('genre', '=', 'Afrobeat')->orderBy('id','desc')->paginate(6);
        $highlifes= Song::where('genre', '=', 'highlife')->orderBy('id','desc')->paginate(6);
        $rnbs=      Song::where('genre', '=', 'RnB')->orderBy('id','desc')->paginate(6);
        $hips=      Song::where('genre', '=', 'Hip-hop')->orderBy('id','desc')->paginate(6);
        $gospels=   Song::where('genre', '=', 'Gospel')->orderBy('id','desc')->paginate(6);
        $others=    Song::where('genre', '=', 'Others')->orderBy('id','desc')->paginate(6);

        return View::make('song.index',['songs'=>$songs,'afrobeats'=>$afrobeats,'highlifes'=>$highlifes, 'rnbs'=>$rnbs,
         'hips'=>$hips, 'gospels'=>$gospels,'others'=>$others]);
    }



      public function getGalleries()
    {
       $modelling =  Gallery::where('cat', '=', 'modelling')->orderBy('id','desc')->paginate(6);
          $others =  Gallery::where('cat', '=', 'others')->orderBy('id','desc')->paginate(6);
            $gals =  Gallery::orderBy('id', 'desc')->paginate(6);

        return View::make('gallery.index',['modelling'=>$modelling, 'others'=>$others,'gals'=>$gals]);

      }

      public function getVideos()
    {
     //   $videos = Video::orderBy('id','desc')->paginate(10);
        $musics=  Video::where('video_type', '=', 'Music video')->orderBy('id','desc')->paginate(6);
        $dances=  Video::where('video_type', '=', 'Dance')->orderBy('id','desc')->paginate(6);
        $comedies=Video::where('video_type', '=', 'Comedy')->orderBy('id','desc')->paginate(6);

        return View::make('video.index', ['musics'=>$musics,'dances'=>$dances, 'comedies'=>$comedies]);
    }

      public function getTalents()
    {

      $musicians = User::where('talents', '=','singing')->confirmed()->paginate(6);
      $models =    User::where('talents', '=','modelling')->confirmed()->paginate(6);
      $dancers =   User::where('talents', '=', 'dancing')->confirmed()->paginate(6);
      $comedians=  User::where('talents', '=', 'comedy')->confirmed()->paginate(6);
      $tops =      User::orderBy('id', 'desc')->confirmed()->paginate(6);
      $fans =      User::where('talents', '=',NULL)->confirmed()->paginate(6);

        return View::make('profile.talents')
        ->with('musicians',$musicians)
        ->with('models', $models)
        ->with('tops', $tops)
        ->with('dancers', $dancers)
        ->with('fans', $fans)
        ->with('comedians',$comedians);
    }

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

    public function testActivate()
    {
      //$username="sammy";
      $data=collect(['username'=>'sammy2','email'=>'testing things']);
      //dd($userdata->get('username'));
      $confirmation_code=str_random(16);

      return view('emails.activate',compact('data','confirmation_code'));

    }

    public function testSend($code)
    {
      dd('testing here');
       return "Activation code:".$code;
    }

    public function getSearch(Request $request)
    {
     // dd($request->get('search'));
      $term = $request->get('search');
      $songs = Song::where('title','LIKE','%'. $term .'%')->paginate(10);
      $videos= Video::where('title','LIKE','%'. $term .'%')->paginate(10);
      $galleries=Gallery::where('caption','LIKE','%'. $term .'%')->paginate(10);
      $talents= User::where('username','LIKE','%'.$term.'%')->paginate(10);
      //dd($songs);
      return view('layout.search_result',compact('songs','videos','galleries','talents','term'));
      //dd(compact('song','video','gallery'));
    }
     public function getSlug()
    {
        $songs=Song::all();
        foreach($songs as $song)
        {
          $song->slug=str_slug($song->title);
          $song->save();
        }
        dd($songs);
    }

    public function getConfirm()
    {
      return view('emails.confirm');
    }

    
}
