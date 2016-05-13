<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Song;
use Input;
use View;
use Auth;
use Redirect;

class SongController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
        $this->middleware(['auth','confirm'],['only'=>['getUpload']]);
    }

    public function getShow($id)
    {   
        $song=Song::findorfail($id);
        $id= $song->id;
        $genre= $song->genre;
        $reSongs =  Song::where('genre', '=', $genre)->take(5)->orderBy('id','desc')->get();

         return View::make('song.single')
        ->with('song',$song)
         ->with('genre', $genre)
        ->with('reSongs',$reSongs);
    }
//  desktop upload page
    public function getUpload()
    {
    if (Auth::check()) {

     $user = Auth::user();
     $s_count= $user->songs()->count();
     if ($s_count < 10 ) {
        return View::make('song.upload');
            }
            else {
                return View::make('notice');
            }
        }
         else {
            return Redirect::to('/profile/#error')->with('error', 'Please Login / SignUp to upload');
        }
     }
//    soundcloud upload page
    public function getUploadLink()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $s_count= $user->songs()->count();
            if ($s_count < 10 ) {
                return View::make('song.upload_track_link');
            }
            else {
                return View::make('notice');
            }
        }
        else {
            return Redirect::to('/profile/#error')->with('error', 'Please Login / SignUp to upload');
        }
    }

    


	public function postCreate2(Request $request)
    {
        //dd($request->all());
        $music = [
            'youtube' => $request->get('youtube'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $request->file('image'),
            'song' =>$request->file('song'),
            'genre' => $request->get('genre'),
            'soundcloud' => $request->get('soundcloud'),


        ];

        $rules = [
            'youtube' => 'min:5',
            'title' => 'required',
            'description' => 'required|min:5',
            'image'=> 'image|mimes:jpeg,jpg,bmp,png,gif|max:3000',
            'song' => 'max:20000',
            'genre' => 'required',
            'soundcloud' => 'min:5',
         ];

        $validator = \Validator::make($music, $rules);
        if ($validator->passes())
        {
           // \DB::beginTransaction();
            $song =new Song;
            if($request->has('soundcloud'))
            {
                $soundcloud = $request->get('soundcloud');
                $mus= $song->getSoundcloud($soundcloud);
                $song->soundcloud= $mus;
            }
            else{
                $mus='No soundcloud';
            }


            if( $request->hasFile('song'))
            {
    
                $music=$request->file('song');
                $song_fileName= $music->getClientOriginalName();
                $m_name = str_random(6).'_'.$song_fileName;
                $desPath= public_path('img/songs/');
                $upload_success = $music->move($desPath, $m_name);
                $hold = 'img/songs/'.$m_name;
                $song->song = $hold;
            }
            else{
                $hold='No song';
            }
            
            if($request->has('youtube'))
            {
                 $youtube = $request->get('youtube');
                 $vid= $song->getYoutube($youtube);
                 $song->youtube= $vid;
            }

             $song->title = $request->get('title');
             $song->genre = $request->get('genre');

             if($request->has('description'))
             {
                $song->description= $request->get('description');
             }
           

	        if ($request->hasFile('image'))
           {
                $imag= $request->file('image');
                $image_name = $imag->getClientOriginalName();
                $name = str_random(6).'_'.$image_name;
                $desPath= public_path('img/songs/images/');
                $upload_success =$imag->move($desPath, $name);
                $song->image='img/songs/images/'.$name;
            }

            if($hold=='No uploads' && $mus=='No youtube')
            {
                return Redirect::back()
                ->with('errors', 'Upload a Song directly OR Supply your soundcloud link')
                ->withInput($request->only('title','description','youtube','genre'));
            }

            $song->user()->associate(Auth::user());
            $song->save();

             if(($song->song == $hold) && ($song->soundcloud == $mus))
            {
                $song->delete();  
                 return Redirect::back()
                     ->with('errors', 'Either Upload Song directly OR Supply your Soundcloud link, not both!!!');              
            }
    
             return Redirect::to('/profile'.'#songs')
             ->with('noticev', 'New song added!!!');

           // \DB::commit();

            return Redirect::to('/profile'.'#songs')
            ->with('notices', 'New song added!!!');


        }

        return Redirect::to('/song/upload2')
        ->with('errors', $validator->messages())
        ->withInput(\Input::only('title','description','youtube','soundcloud','genre'));
     }

     public function postCreate3()
     {
     	$caption=Input::get('caption');
		$url='http://demo-27c.curiouzmind.com/profile';
		$file2 = Input::file('image');
		$filename2 = str_random(16);
		$extension2 = $file2->getClientOriginalExtension();
		$size2 = $file2->getSize();
		$fullName2 = $filename2.'_'.$extension2;
		$upload_success = $file2->move('uploads', $fullName2);
		if( $upload_success ) {
		return Response::json([ 'caption'=>$caption,'name2' => $fullName2, 'url' => $url], 200);
		} else {
			return Response::json('error', 400);
		}
     }


     public function getEdit(Song $song)
     {
        return View::make('profile.songs.edit2')
        ->with('song', $song);
     }

     public function postEdit()
     {

        $music = [
            'youtube' => Input::get('youtube'),
            'title' => Input::get('title'),
            'description' => Input::get('description'),
            'image' => Input::file('image'),

        ];

        $rules = [
            'youtube' => 'min:5',
            'title' => 'required|min:4',
            'description' => 'min:5',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',

        ];

        $validator = Validator::make($music, $rules);
        if ($validator->passes())
        {

            $song= Song::findorFail(Input::get('id'));
            $song->title= Input::get('title');
            $song->description = Input::get('description');
            $song->genre =Input::get('genre');


            $youtube = Input::get('youtube');
            $vid= $song->getYoutube($youtube);
            $song->youtube= $vid;

            $tags= new Tag;
            $tags->name= Input::get('tags');
            $tags->type = 'Song';
            $song->tags()->save($tags);


            $imag= Input::file('image');

            $filename = str_random(12);
            $desPath= public_path('img/songs/images/');
            $upload_success =$imag->move($desPath, $filename);
            $song->image='img/songs/images/'.$filename;
            $song->save();

            return Redirect::to('/profile')
            ->with('notices', 'New song added!!!');
     }

        //return Redirect::to('/song/edit/{$song}')
     //->with('errors', $validator->messages())
        return Redirect::back()
       ->with('errors', $validator->messages())
        ->withInput(Input::except('image'));

     }

     public function getDelete(Song $song)
     {

        $user = Auth::user();
        return View::make('profile.songs.delete')
        ->with('song', $song)
        ->with('user', $user);
     }


     public function postDelete()
     {
       $song=Song::findorfail(Input::get('id'));

        if ($song) {
            File::delete('img/songs/'.$song->song);
            File::delete('img/songs/images'.$song->image);
             $song->delete();

               return Redirect::to('/profile')
                ->with('notices', 'Song deleted successfully');
    }

         return Redirect::to('/profile')
        ->with('errors', 'Error deleting song');


  }


  public function getSearch()
    {
    // Retrieve user's input ('q' query parameter)
	 $query = Input::get('q','');

	 // If the input is empty, return empty JSON response
	 if(trim(urldecode($query)) == '')
	  return Response::json(['data' => []], 200);

	 // Search the data in DB and retrieve a list of items matching the search query
	 $data1 = DB::table('songs')
	 ->where('title','like','%'.$query.'%')
	 ->orderBy('title','asc')
	 ->take(5)
	 ->get(['id', 'title', 'image']);

	 $data2 = DB::table('videos')
	 ->where('title','like','%'.$query.'%')
	 ->orderBy('title','asc')
	 ->take(5)
	 ->get(['id', 'title', 'image']);

	 $data3 = DB::table('galleries')
	 ->where('caption','like','%'.$query.'%')
	 ->orderBy('caption','asc')
	 ->take(5)
	 ->get(['id', 'caption', 'image']);

	 $data3 = DB::table('galleries')
	 ->where('caption','like','%'.$query.'%')
	 ->orderBy('caption','asc')
	 ->take(5)
	 ->get(['id', 'caption', 'image']);

	 // Return JSON-encoded list of items as a response to the request
 	return Response::json(['data' => $data]);

 }


    public function editSong()
    {
      return View::make('song.upload');
    }

    public function updateSong()
    {
       $song =new Song;
       $song->title = Input::get('title');
       $song->description = Input::get('description');

        $file = Input::file('pic');

        $fileName = Str::random(12);
        $extension = $file->getClientOriginalExtension();
        $name = $fileName.'.'.$extension;


        $desPath=public_path('img/songs/');

        $song->image = 'img/songs/'.$name;
        $song->user()->associate(Auth::user());
        $song->save();
        $file->move($desPath,$name);

         return Redirect::to('/profile')
         ->with('noticeg', 'New Song added!!!');
    }
}
