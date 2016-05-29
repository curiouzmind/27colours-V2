<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Video;
use App\Like;
use View;
use Auth;
use Redirect;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {  
        $this->middleware(['auth','confirm'],['only'=>['getUpload']]);
        $this->middleware('auth',['only'=>'getLike']);
    }

    public function getUpload()
    {
        if (Auth::check()) {

            $user = Auth::user();
            $v_count= $user->videos()->count();
                if ($v_count < 10 ) {
                     return View::make('video.video-upload');
                }
                else {
                return View::make('notice');
            }
        }

                else {
            return Redirect::to('/profile/#error')->with('error', 'Something wrong with upload');
        }

     }


    public function getShow($id)
    {
        $video=Video::findorfail($id);
        $id= $video->id;
        $type= $video->video_type;
        $reVideos =  Video::where('video_type', '=', $type)->take(5)->orderBy('id','desc')->get();

         return View::make('video.single')
        ->with('video',$video)
        ->with('type', $type)
        ->with('reVideos',$reVideos);

    }

    

         function postCreate(Request $request)
    {
        //dd($request->all());

        $vid = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $request->file('image'),
            'video' =>$request->file('video'),
            'video_type' => $request->get('video_type'),
            'youtube' => $request->get('youtube'),
        ];

        $rules = [
            'title' => 'required|min:3',
            'description'=> 'min:5',
            'image'=> 'image|mimes:jpeg,jpg,bmp,png,gif|max:3000',
            'video' => 'max:8000|mimes:mp4,MP4',
            'video_type' => 'required',
            'youtube' => 'min:5',
        ];

        //$hold='';
        $validator = \Validator::make($vid, $rules);
        if ($validator->passes())
        {
            $video = new Video;
            if($request->has('youtube'))
            {
                $youtube = $request->get('youtube');
                $yvid= $video->getYoutube($youtube);
                $video->youtube= $yvid;
            }
            else{
                $yvid='No youtube';
            }

            $video->title = $request->get('title');
            $video->video_type=$request->get('video_type');

            if($request->has('description'))
            {
                $video->description=$request->get('description');
            }

            if($request->hasFile('video'))
            {
                $vid= $request->file('video');
                //if(isset($vid))
               // $vid_name = $vid->getClientOriginalName();
                $vid_name='.mp4';
                $v_name = str_random(15).$vid_name;
                $desPath= public_path('img/videos/');
                $upload_success =$vid->move($desPath,$v_name);
                $hold= 'img/videos/'.$v_name;
                $video->video =$hold;
            }
            else{
                $hold='No uploads';
            }

            if ($request->hasFile('image'))
             {
                $imag= $request->file('image');
                $imag_name = $imag->getClientOriginalName();
                $name = str_random(6).'_'.$imag_name;
                $desPath= public_path('img/videos/images/');
                $upload_success =$imag->move($desPath, $name);
                $video->image='img/videos/images/'.$name;
            }          

            if($hold=='No uploads' && $yvid=='No youtube')
            {
                return Redirect::back()
                ->with('errors', 'Upload a Video directly OR Supply your youtube link')
                ->withInput($request->only('title','description','youtube','video_type'));
            }
            $video->user()->associate(Auth::user());
            $video->save();

             if(($video->video == $hold) && ($video->youtube == $yvid))
            {
                $video->delete();  
                 return Redirect::back()
                ->with('errors', 'Either Upload Video directly OR Supply your youtube link, not both!!!');               
            }
    
             return Redirect::to('/profile'.'#videos')
                    ->with('notices', 'New video added!!!');

         }
        return Redirect::back()
        ->with('errors', $validator->messages())
        ->withInput($request->only('title','description','youtube','video_type'));

    }

    function postEdit($id)
    {

        $vid = [
            'youtube' => Input::get('youtube'),
            'image' => Input::file('image'),
            'video_type' => Input::get('genre'),
        ];

        $rules = [
            'youtube' => 'min:2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'video_type' => 'required',
        ];

        $validator = Validator::make($vid, $rules);
        if ($validator->passes())
        {
            $video =Video::findOrFail($id);
            $video->youtube = Input::get('youtube');
            $video->video_type=Input::get('genre');

            $tags= new Tag;
            $tags->name= Input::get('tags');
            $tags->video_id = $tags->video->id;
            $tags->save();


            $image= Input::file('image');

            $filename = str_random(12);
            $desPath= public_path('img/videos/images');
            $upload_success =$image->move($desPath, $filename);
            $video->song_art='img/videos/images'.$filename;
            $video->user()->associate(Auth::user());
            $video->save();

              return Redirect::to('/profile')
             ->with('noticev', 'New video added!!!');

          }
        return Redirect::to('/video/upload')
        ->with('errorv', $validator->messages());


    }

     public function postProcess(Request $request)
    {
        $video_id=$request->get('video_id');
        $video=Video::findorfail($video_id);
        $matchLike =['likeable_id'=>$video_id,'user_id'=>\Auth::id()];
        $userLike=Like::where($matchLike)->first();
        
        if($userLike == null){
            $like=new Like();
                $like->user_id=\Auth::id();
                $video->likes()->save($like);
                
                $data[]=array('id' =>1, 'count' => $video->likes->count(), 'text'=>'not-liked');
                 return \Response::json(['data'=> $data]);
          }
         else {
     
             \Auth::user()->likes()->delete($userLike);
             $data[]=array('id' =>0, 'count' => $video->likes->count(), 'text'=>'liked');
             return \Response::json(['data'=> $data]);
          }

    }

    public function getLike()
    {
        return "you can see this";
    }

    public function search()
    {
        $search =Input::get('s-term');
        $video= Video::search($search)->paginate(10);


      $songs = Song::orderBy('id','desc')->paginate(10);
      $galleries= Gallery::orderBy('id','desc')->paginate(10);

     return View::make('layout.home')
     ->with('songs', $songs)
     ->with('galleries', $galleries)
     ->with('videos', $videos);


    }

     public function getEdit(Video $video)
     {
        return View::make('profile.videos.edit')
        ->with('video', $video);
     }

    public function delete(Video $video)
     {
        $user = Auth::user();
        return View::make('profile.videos.delete')
        ->with('video', $video)
        ->with('user', $user);
     }

     public function postDelete()
     {
       $video=Video::findorfail(Input::get('id'));

        if ($video) {
            File::delete('img/videos/'.$video->video);
            File::delete('img/videos/images/'.$video->image);

             $video->delete();

               return Redirect::to('/profile')
                ->with('notices', 'Video deleted successfully');
    }

         return Redirect::to('/profile')
        ->with('errors', 'Error deleting video');


  }



    /* post functions */
    public function savePost()
    {
        $post = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $valid = Validator::make($post, $rules);
        if ($valid->passes())
        {
            $post = new Post($post);
            $post->comment_count = 0;
            $post->read_more = (strlen($post->content) > 120) ? substr($post->content, 0, 120) : $post->content;
            $post->save();
            return Redirect::to('admin/dash-board')->with('success', 'Post is saved!');
        }
        else
            return Redirect::back()->withErrors($valid)->withInput();
    }

    public function updatePost(Post $post)
    {
        $data = [
            'title' => Input::get('title'),
            'content' => Input::get('content'),
        ];
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $valid = Validator::make($data, $rules);
        if ($valid->passes())
        {
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->read_more = (strlen($post->content) > 120) ? substr($post->content, 0, 120) : $post->content;
            if(count($post->getDirty()) > 0) /* avoiding resubmission of same content */
            {
                $post->save();
                return Redirect::back()->with('success', 'Post is updated!');
            }
            else
                return Redirect::back()->with('success','Nothing to update!');
        }
        else
            return Redirect::back()->withErrors($valid)->withInput();
    }
}
