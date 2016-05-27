<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Events\UserWasBanned;
use App\Profile;
use View;
use Auth;
use Redirect;
use Input;

class ProfileController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
     {
        $this->middleware('confirm',['only'=>['getPhoto']]);
    }

    public function getIndex()
    {
        if (\Auth::check())  {
            $user = \Auth::user();
            $songs= $user->songs()->idDescending()->get();
            $s_count= $user->songs()->count();
            $videos= $user->videos()->idDescending()->get();
            $v_count= $user->videos()->count();
            $galleries= $user->galleries()->idDescending()->get();
            $g_count= $user->galleries()->count();

           //dd($user->profilePhoto);

            return \View::make('profile.index2')
                ->with('songs', $songs)
                ->with('s_count', $s_count)
                ->with('galleries', $galleries)
                ->with('g_count', $g_count)
                ->with('videos', $videos)
                ->with('v_count',$v_count)
                ->with('user', $user);

        }
        else{
            return \Redirect::to('login');

        }

    }

    public function getShow($id)
    {
        $user=User::findorFail($id);
        $songs= $user->songs()->idDescending()->get();
        $s_count= $user->songs()->count();
        $videos= $user->videos()->idDescending()->get();
        $v_count= $user->videos()->count();
        $galleries= $user->galleries()->idDescending()->get();
        $g_count= $user->galleries()->count();

        return View::make('profile.index2_logout')
            ->with('songs', $songs)
            ->with('s_count', $s_count)
            ->with('galleries', $galleries)
            ->with('g_count', $g_count)
            ->with('videos', $videos)
            ->with('v_count', $v_count)
            ->with('user', $user);
    }

    public function notice()
    {
        return View::make('notice');
    }

    public function getEdit()
    {
        if (Auth::check())  {
            $user = Auth::user();
            $talents=['dancing'=>'Dancing','singing'=>'Singing','comedy'=>'Comedy','others'=>'Others'];
            // $this->user = $user;
            return view('profile.edit',compact('user', 'talents'));
        }
        return Redirect::to('profile/')
            ->with('errors', 'Error updating your details');
    }

    public function privacyPolicy()
    {
        return View::make('profile.privacy_policy');
    }


    public function postEdit(Request $request)
    {
        $data = [
            'talent' => $request->get('talents'),
            'first_name' => $request->get('fname'),
            'last_name' => $request->get('lname')
        ];

        $rules = [
            'talent' => 'required|min:2',
            'first_name'=> 'required|min:2',
            'last_name'=> 'required|min:2'
        ];

        $valid = \Validator::make($data, $rules);
        if ($valid->passes())
        {
            //$user= User::findorFail(Input::get('id'));
            $id=\Auth::id();
            $user= User::findorFail($id);

            $user->first_name= $data['first_name'];
            $user->last_name= $data['last_name'];
            $user->talents= $data['talent'];
            $user->username= $request->get('username');
            $user->tagline= $request->get('tagline');
            $user->facebook=$request->get('facebook');
            $user->twitter=$request->get('twitter');
            $user->soundcloud=$request->get('soundcloud');
            $user->youtube=$request->get('youtube');

            $user->save();

            return redirect('/profile')
                ->with('notices','Successfully updated your page');
        }
        else{
            return back()
                ->with('errors', $valid->messages())
                ->withInput();
        }
    }


    public function getPhoto()
    {
        $user = Auth::user();
        return View::make('profile.photo_upload')
            ->with('user', $user);
    }

    public function postCreate2()
    {

        $picture = [
            'image' => $request->file('image'),
        ];

        $rules = [
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = \Validator::make($picture, $rules);
        if ($validator->passes())
        {

            $user_id= Input::get('id');
            $user= User::findorFail($user_id);
            $profilePhoto = $user->profilePhoto;

            $image= Input::file('image');
            if (isset($image))
            {
                $filename = str_random(12);
                $extension = $image->getClientOriginalExtension();
                $name = $filename.'.'.$extension;
                $desPath = public_path('img/profile_photos/');
                $upload_success =$image->move($desPath, $name);
            }

            if (! isset($profilePhoto->image))
            {
                $pic= new ProfilePhoto;
                $pic->image ='img/profile_photos/'.$name;
                $user->profilePhoto()->save($pic);
                $url='/profile';

                // return Redirect::to('/profile')
                return Response::json(['success'=> 'Profile Photo uploaded', 'url' => $url ], 200);

            }
            if(isset($profilePhoto->image))
            {
                $profilePhoto->image ='img/profile_photos/'.$name;
                $user->profilePhoto()->save( $profilePhoto);
                $url='/profile';
                //return Redirect::to('/profile')
                return Response::json(['success'=> 'Profile Photo updated', 'url' => $url ], 200);
                // ->with('notices', ' profile photo updated!');
            }

        }
        return Response::json(['error' => 'Error Uploading']);

    }


    public function postPhoto()
    {

        $picture = [
            'image' => Input::file('image'),
        ];

        $rules = [
            'image'=> 'required|image|mimes:jpeg,jpg,bmp,png,gif',
        ];

        $validator = Validator::make($picture, $rules);
        if ($validator->passes())
        {

            $user_id= Input::get('id');
            $user= User::findorFail($user_id);
            $profilePhoto = $user->profilePhoto;

            $image= Input::file('image');
            $filename = str_random(12);
            $desPath = public_path('img/profile_photos/');
            $upload_success =$image->move($desPath, $filename);


            if (! isset($profilePhoto->image))
            {
                $pic= new ProfilePhoto;
                $pic->image ='img/profile_photos/'.$filename;
                $user->profilePhoto()->save($pic);

                return Redirect::to('/profile')
                    ->with('notices', 'profile photo added!!!');
            }
            if(isset($profilePhoto->image))
            {
                $profilePhoto->image ='img/profile_photos/'.$name;
                $user->profilePhoto()->save( $profilePhoto);
                return Redirect::to('/profile')
                    ->with('notices', ' profile photo updated!');
            }

        }
        return Redirect::to('/profile/upload')
            ->with('errors', $validator->messages())
            ->withInput(Input::except('image'));


    }
    public function getBan()
    {
        $user =new User;
        $user->name='Efosa';
        event(new UserWasBanned($user));
        return 'This is great';
    }
}
