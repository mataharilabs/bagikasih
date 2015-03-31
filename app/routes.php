<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Implements 

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::post('/signin', array('as' => 'login', 'uses' => 'HomeController@signin'));
Route::post('/signup', array('as' => 'daftar', 'uses' => 'HomeController@signup'));
// Route::get('/logout', array('as' => 'home', 'uses' => 'HomeController@signout'));

// Target Sosial (Social Target)
Route::get('/target-sosial', array('as' => 'temukan-target-sosial', 'uses' => 'SocialTargetController@index'));
Route::get('/target-sosial/{any}', array('as' => 'lihat-target-sosial', 'uses' => 'SocialTargetController@show'));
Route::get('/buat-target-sosial', array('as' => 'buat-target-sosial', 'uses' => 'SocialTargetController@create'));
Route::post('/buat-target-sosial', array('as' => 'buat-target-sosial.post', 'uses' => 'SocialTargetController@create'));


// Aksi Sosial (Social Action)
Route::get('/aksi-sosial', array('as' => 'temukan-aksi-sosial', 'uses' => 'SocialActionController@index'));
Route::get('/aksi-sosial/{any}', array('as' => 'lihat-aksi-sosial', 'uses' => 'SocialActionController@show'));
Route::get('/buat-aksi-sosial', array('as' => 'buat-aksi-sosial', 'uses' => 'SocialActionController@create'));
Route::post('/buat-aksi-sosial', array('as' => 'buat-aksi-sosial.post', 'uses' => 'SocialActionController@create'));


// Event
Route::get('/event', array('as' => 'temukan-event', 'uses' => 'EventController@index'));
Route::get('/event/{any}', array('as' => 'lihat-event', 'uses' => 'EventController@show'));
Route::get('/buat-event', array('as' => 'buat-event', 'uses' => 'EventController@create'));
Route::post('/buat-event', array('as' => 'buat-event.post', 'uses' => 'EventController@create'));


// User
Route::get('/masuk', array('as' => 'signin', 'uses' => 'UserController@signin'));
Route::post('/masuk', array('as' => 'signin.post', 'uses' => 'UserController@signin'));
Route::get('/daftar', array('as' => 'signup', 'uses' => 'UserController@create'));
Route::post('/daftar', array('as' => 'signup.post', 'uses' => 'UserController@create'));
Route::post('/keluar', array('as' => 'signout', 'uses' => 'UserController@signout'));
Route::get('/{any}', array('as' => 'lihat-user', 'uses' => 'UserController@show'));


// Static Pages
Route::get('/tentang-kami', array('as' => 'tentang-kami', function(){
	return View::make('bagikasih.page.tentang-kami');
}));
Route::get('/kontak-kami', array('as' => 'kontak-kami', function(){
	return View::make('bagikasih.page.kontak-kami');
}));
Route::get('/bantuan', array('as' => 'bantuan', function(){
	return View::make('bagikasih.page.bantuan');
}));
Route::get('/cara-kerja', array('as' => 'cara-kerja', function(){
	return View::make('bagikasih.page.bantuan');
}));
Route::get('/beri-donasi', array('as' => 'beri-donasi', function(){
	return View::make('bagikasih.page.bantuan');
}));


//StyleGuide
Route::group(array('prefix' => 'styleguide'), function(){
	Route::get('/home', function()
	{
		return View::make('styleguide.index');
	});

	Route::get('/kontak-kami', function()
	{
		return View::make('styleguide.kontak-kami');
	});

	Route::get('/tentang-kami', function()
	{
		return View::make('styleguide.tentang-kami');
	});
});

