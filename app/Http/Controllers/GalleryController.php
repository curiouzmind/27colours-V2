<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Gallery;
use View;
use Auth;
use Redirect;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
        $this->middleware('confirm',['only'=>['getUpload']]);
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

     public function postCreate2()
     {
        $photo = [
            'title' => Input::get('caption'),
            'image' => Input::file('image'),
            'genre' => Input::get('genre'),
        ];

        $rules = [
            'title' => 'min: 2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'genre' => 'required',
        ];

         $validator = Validator::make($photo, $rules);

        if ($validator->passes()) {
            $pic =new Gallery;
            $pic->caption = Input::get('caption');
            $pic->cat =Input::get('genre');

             if (Input::hasFile('image'))
             {

            $image = Input::file('image');
            $filename = str_random(12);
            $extension = $image->getClientOriginalExtension();
            $name = $filename.'.'.$extension;


           $desPath= public_path('img/galleries/');


            $upload_success =$image->move($desPath,$name);
            $pic->image ='img/galleries/'.$name;
            $pic->user()->associate(Auth::user());
            $pic->save();

            return Redirect::to('/profile')
           ->with('notices', 'New Photos added!!!')
           ->withInput();
         //  if ($pic) {
        //  return Response::json(['id' => $pic->id,  'caption' => $pic->caption]);
          //      } else {
          //              return Response::json(['error'=> 'Error Saving picture']);
          //         }

       }

      	//  return Response::json(['error' => 'Error Uploading']);
        return Redirect::to('/gallery/upload')
        ->with('errors', $validator->messages());

	}
	//return Response::json($validation->errors()->toArray());
        return Redirect::to('/gallery/upload')
        ->with('errors', $validator->messages());

    }

    public function postCreate()
     {
        $photo = [
            'title' => Input::get('caption'),
            'image' => Input::file('image'),
            'genre' => Input::get('genre'),
        ];

        $rules = [
            'title' => 'min: 2',
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
            'genre' => 'required',
        ];

         $validator = Validator::make($photo, $rules);
         $url='http://27colours.com/profile';

        if ($validator->passes()) {
            $pic =new Gallery;
            $caption=Input::get('caption');
            $pic->caption = $caption;
            $genre =Input::get('genre');
            $pic->cat =$genre;


 	    $image = Input::file('image');
             if (isset($image))
             {
            $filename = str_random(12);
            $extension = $image->getClientOriginalExtension();
            $name = $filename.'.'.$extension;
            $desPath= public_path('img/galleries/');
            $upload_success =$image->move($desPath,$name);
            $pic->image ='img/galleries/'.$name;
            $url='http://27colours.com/profile';
            }  else{

       		 return Response::json(['error'=> 'Error Uploading picture']);

            }
            	$pic->user()->associate(Auth::user());
            	$pic->save();
            	return Response::json(['name' => $name, 'url' => $url, 'caption'=>$caption, 'genre'=>$genre ], 200);


       }

      	  return Response::json(['error' => 'Error Uploading']);


    }


    public function postUploadp()
     {
     	//	$title=Input::get('title');
    	//	$file = Input::file('filedata');
	//	$filename = str_random(16);
	//	$extension = $file->getClientOriginalExtension();
	//	$size = $file->getSize();
	//	$fullName = $filename.'.'.$extension;
	//	$upload_success = $file->move('uploads', $fullName);
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

         return Redirect::to('/profile')
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
