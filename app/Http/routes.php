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
Route::group(['middleware' => ['web']], function () {
     Route::auth();
});
Route::get('/privacyPolicy', 'ProfileController@privacyPolicy');

Route::get('song/show/{id}', 'SongController@getShow');
Route::controller('/song', 'SongController');

Route::get('/video/show/{id}', 'VideoController@getShow');

Route::controller('/video', 'VideoController');

Route::get('/gallery/show/{id}', 'GalleryController@getShow');
Route::controller('/gallery', 'GalleryController');
Route::Controller('admin','AdminController');


Route::get('/user/show/{id}', 'ProfileController@getShow');
Route::controller('profile', 'ProfileController');
Route::get('/events','profileController@getBan');
Route::get('test/activate','HomeController@testActivate');
Route::get('testing/activation/{code}','HomeController@testSend');
Route::get('testing/email','EmailController@sendTest');

Route::get('activate/{confirmation_code}', 'Auth\AuthController@activateAccount');
Route::get('login/facebook', 'Auth\AuthController@facebook');

Route::get('/ajax/posts', array('uses'=>'HomeController@getPosts'));
Route::get('/', array('uses'=>'HomeController@getIndex'));
Route::controller('/', 'HomeController');




//Route::get('/home', 'HomeController@index');
