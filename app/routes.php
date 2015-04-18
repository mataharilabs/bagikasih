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

// Home Controller

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::post('/signup', array('as' => 'signup', 'uses' => 'HomeController@signup'));
Route::post('/signin', array('as' => 'signin', 'uses' => 'HomeController@signin'));
Route::get('/login', array('as' => 'login', 'uses' => 'HomeController@login'));
Route::group(array('prefix' => 'setting','before' => 'auth'), function(){
	Route::get('/logout', array('as' => 'logout', 'uses' => 'HomeController@logout'));
	Route::get('/edit-profile', array('as' => 'edit_profile', 'uses' => 'UserController@editprofile'));
	Route::post('/update-profile', array('as' => 'update_profile', 'uses' => 'UserController@updateprofile'));
	Route::get('/edit-settings', array('as' => 'edit_settings', 'uses' => 'UserController@editsettings'));
	Route::post('/post-edit-settings', array('as' => 'post_edit_settings', 'uses' => 'UserController@posteditsettings'));

	// About donation
	Route::get('/riwayat-donasi', array('as' => 'riwayat-donasi', 'uses' => 'DonationController@index'));
});

Route::group(array('before' => 'auth'), function(){
	
	// Donation
	Route::post('/donation', array('as' => 'beri-donasi', 'uses' => 'DonationController@create'));
	Route::get('/donation/{any}', array('as' => 'lihat-donasi', 'uses' => 'DonationController@show'));
	Route::post('/delete-donation', array('as' => 'hapus-donasi', 'uses' => 'DonationController@delete'));
	Route::post('/donation-confirmation', array('as' => 'konfirmasi-donasi', 'uses' => 'PaymentController@create'));
});


// Event
Route::get('/event', array('as' => 'temukan-event', 'uses' => 'EventController@index'));
Route::get('/event/{any}', array('as' => 'lihat-event', 'uses' => 'EventController@show'));
Route::get('/daftarkan-event', array('as' => 'buat-event', 'uses' => 'EventController@create'));	
Route::post('/post-event', array('as' => 'buat-event.post', 'uses' => 'EventController@create_post'));
Route::get('/update-event', array('as' => 'buat-event.update', 'uses' => 'EventController@update_post'));


// Social Celebrity
Route::get('/selebriti-sosial', array('as' => 'selebriti-sosial', 'uses' => 'UserController@index'));

// Target Sosial (Social Target)
Route::get('/target-sosial', array('as' => 'temukan-target-sosial', 'uses' => 'SocialTargetController@index'));
Route::get('/target-sosial/{any}', array('as' => 'lihat-target-sosial', 'uses' => 'SocialTargetController@show'));
Route::get('/daftarkan-target-sosial', array('as' => 'buat-target-sosial', 'uses' => 'SocialTargetController@create'));
Route::post('/daftarkan-target-sosial', array('as' => 'buat-target-sosial.post', 'uses' => 'SocialTargetController@create_post'));


// Aksi Sosial (Social Action)
Route::get('/aksi-sosial', array('as' => 'temukan-aksi-sosial', 'uses' => 'SocialActionController@index'));
Route::get('/aksi-sosial/{any}', array('as' => 'lihat-aksi-sosial', 'uses' => 'SocialActionController@show'));
Route::get('/buat-aksi-sosial', array('as' => 'buat-aksi-sosial', 'uses' => 'SocialActionController@create'));
Route::get('/buat-aksi-sosial/{any}', array('as' => 'buat-aksi-sosial.post', 'uses' => 'SocialActionController@create'));


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
Route::get('/beri-donasi', array('as' => 'cara-beri-donasi', function(){
	return View::make('bagikasih.page.bantuan');
}));


// User Profile
Route::get('/{any}', array('as' => 'lihat-profil', 'uses' => 'UserController@show'));


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

	Route::get('/error', function()
	{
		return View::make('styleguide.error');
	});
});

