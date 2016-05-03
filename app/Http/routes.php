<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('user','User');
//Route::model('blog','Blog');
//Route::model('song','Song');
//Route::model('gallery', 'Gallery');
//Route::model('video', 'Video');


Route::get('/privacyPolicy', 'ProfileController@privacyPolicy');

Route::get('song/show/{id}', 'SongController@getShow');
Route::controller('/song', 'SongController');

Route::get('/video/show/{id}', 'VideoController@getShow');

Route::controller('/video', 'VideoController');

Route::get('/gallery/show/{id}', 'GalleryController@getShow');
Route::controller('/gallery', 'GalleryController');


Route::get('/user/show/{id}', 'ProfileController@getShow');
Route::controller('/profile', 'ProfileController');
Route::get('/events','profileController@getBan');


//Confide routes
//Route::get('users/register',['as'=> 'register', 'uses' =>'UsersController@getCreate']);
//Route::post('users', 'UsersController@postCreate');
//Route::get('users/login', ['as'=>'login', 'uses'=> 'UsersController@getLogin']);
//Route::post('users/login', 'UsersController@postLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@getForgotPassword');
Route::post('users/forgot_password', 'UsersController@postForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@getResetPassword');
Route::post('users/reset_password', 'UsersController@postResetPassword');
Route::get('users/logout', ['as' => 'logout', 'uses' => 'UsersController@getLogout']);
Route::get('/upload', 'UploadController@index');

Route::get('users/login/fb', ['as' => 'fblogin', 'uses'=> 'HomeController@loginWithFacebook']);
Route::get('users/login/go', ['as' => 'gologin', 'uses'=> 'HomeController@loginWithGoogle']);
Route::get('send', 'EmailController@sendTest');

Route::get('activate/{confirmation_code}', '\Auth\AuthController@activateAccount');
Route::auth();

Route::get('/ajax/posts', array('uses'=>'HomeController@getPosts'));
Route::get('/', array('uses'=>'HomeController@getIndex'));
Route::controller('/', 'HomeController');




//Route::get('/home', 'HomeController@index');
