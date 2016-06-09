<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Gallery;
use App\Like;
use View;
use Auth;
use Redirect;
use App\Services\Mailers\UserMailer;

class GalleryController extends Controller
{
    protected $mailer;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserMailer $mailer)
     {
        $this->mailer= $mailer;
        $this->middleware(['auth','confirm'],['only'=>['getUpload']]);
        $this->middleware('auth',['only'=>'getLike']);
    }

    public function getUpload()
    {
        if (Auth::check()) {
          $user = Auth::user();
          $g_count= $user->galleries()->count();
                if ($g_count < 10 ) {

              return View::make('gallery.upload');
              }
              else {
                return View::make('notice');
            }
          }

        else {
            return Redirect::to('/profile/#error')->with('error', 'Please Login/ Signup to upload');
        }

     }


     public function getShow($id)
    {
        $gallery=Gallery::findorfail($id);
        $id= $gallery->id;
      $cat= $gallery->cat;
      $reCats =  Gallery::where('cat', '=', $cat)->take(5)->orderBy('id','desc')->get();

        return View::make('gallery.single')
        ->with('gallery',$gallery)
        ->with('cat', $cat)
        ->with('reCats', $reCats);

    }

     public function postCreate(Request $request)
     {
        $this->validate($request,[
            'caption' => 'min: 2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'cat' => 'required'
         ]);
        
            $pic =new Gallery;
            $pic->caption = $request->get('caption');
            $pic->cat =$request->get('cat');

             if ($request->hasFile('image'))
             {

                $image = $request->file('image');
                $filename = $image->getClientOriginalName();
                $name = str_random(6).'-'.$filename;
                $desPath= public_path('img/galleries/');
                $upload_success =$image->move($desPath,$name);
                $pic->image ='img/galleries/'.$name;
                $pic->user()->associate(\Auth::user());
                $pic->save();

            return Redirect::to('/profile'.'#pictures')
           ->with('notices', 'New Photos added!!!')
           ->withInput();

	       }
	
        return Redirect::to('/gallery/upload')
        ->with('errors', 'Problem with your upload');

    }

    public function postProcess(Request $request)
    {
        $gallery_id=$request->get('gallery_id');
        $gallery=Gallery::findorfail($gallery_id);
        $matchLike =['likeable_id'=>$gallery_id,'user_id'=>\Auth::id()];
        $userLike=Like::where($matchLike)->first();
        
        if($userLike == null){
            $like=new Like();
                $like->user_id=\Auth::id();
                $gallery->likes()->save($like);

                $this->mailer->sendLikeGallery($gallery,$like);
                
                $data[]=array('id' =>1, 'count' => $gallery->likes->count(), 'text'=>'not-liked');
                 return \Response::json(['data'=> $data]);
          }
         else {
     
             \Auth::user()->likes()->delete($userLike);
             $data[]=array('id' =>0, 'count' => $gallery->likes->count(), 'text'=>'liked');
             return \Response::json(['data'=> $data]);
          }

    }

    public function getLike()
    {
        return 'nothing';
    }


    public function getEdit()
    {
      return View::make('gallery.upload');
    }

    public function updateGallery()
    {
      /* $photo = [
            'caption' => Input::get('caption'),
            'image' => Input::file('image'),
        ];

        $rules = [
            'caption' => 'required|min:2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = Validator::make($photo, $rules);

        if ($validator->passes())
        {    */
       $gallery =new Gallery;
       $gallery->caption = Input::get('caption');

        $file = Input::file('pic');

        $fileName = Str::random(12);
        $extension = $file->getClientOriginalExtension();
        $name = $fileName.'.'.$extension;


        $desPath= public_path('img/galleries/');

        $gallery->image = 'img/galleries/'.$name;
        $gallery->user()->associate(Auth::user());
        $gallery->save();
        $file->move($desPath,$name);

         return Redirect::to('/profile'.'#pictures')
         ->with('noticeg', 'New Photos added!!!');
     // $gallery->image = 'http://localhost:8060/public/img'.$name;
    //  }
    //  return Redirect::to('/editGallery')
    //    ->with('errorg', $validator->messages());

    }


     public function postDelete()
     {
       $gallery= Gallery::find(Input::get('id'));

        if ($gallery) {
            File::delete('img/galleries/'.$gallery->image);
             $gallery->delete();

 		//return 'Picture Deleted!';
               return Redirect::to('/profile')->with('noticeg', 'Picture deleted successfully');
   	 }
 		//return 'Something went wrong, Picture not deleted !';
        	 return Redirect::to('/profile')
       		 ->with('errorg', 'Error deleting picture');



  }



public function search()
    {
        $search =Input::get('s-term');

        $galleries= Gallery::search($search)->paginate(10);


      $videos = Video::orderBy('id','desc')->paginate(10);
      $songs= Song::orderBy('id','desc')->paginate(10);

     return View::make('layout.home')
     ->with('songs', $songs)
     ->with('galleries', $galleries)
     ->with('videos', $videos);

 }
}
