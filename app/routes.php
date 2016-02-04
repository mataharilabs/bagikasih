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

Route::model('country', 'Country');
Route::model('city', 'City');
Route::model('user', 'User');
Route::model('social_target_category', 'SocialTargetCategory');
Route::model('social_action_category', 'SocialActionCategory');
Route::model('event_category', 'EventCategory');
Route::model('donation', 'Donation');
Route::model('newsletter', 'Newsletter');
Route::model('photo', 'Photo');
// Implements 
// Admin Panel
if (App::isLocal()) $admin_domain = 'admin.bagikasih.dev';
else  $admin_domain = 'admin.bagikasih.com';

Route::group(array('domain' => $admin_domain), function()
{

	// login
	Route::get('/signin', array('as' => 'signin', 'uses' => 'AdminBaseController@admin'));
	Route::post('/signin', array('as' => 'signin.post', 'uses' => 'AdminBaseController@admin'));

	Route::group(array('before' => 'admin'),function(){

		Route::get('/signout', array('as' => 'signout', 'uses' => 'AdminBaseController@signout'));
		Route::get('/setting', array('as' => 'admin.setting', 'uses' => 'AdminBaseController@setting'));
		Route::post('/setting', array('as' => 'admin.setting.post', 'uses' => 'AdminBaseController@setting'));

		Route::get('/', array('as' => 'admin.dashboard', 'uses' => 'AdminDashboardController@index'));
		
		// SOCIAL TARGET
		Route::get('/social-target', array('as' => 'admin.social-target', 'uses' => 'AdminSocialTargetController@index'));
		Route::get('/social-target/setphoto', array('as' => 'admin.social-target.setphoto', 'uses' => 'AdminSocialTargetController@setphoto'));
		Route::get('/social-target/dropphoto', array('as' => 'admin.social-target.dropphoto', 'uses' => 'AdminSocialTargetController@dropphoto'));
		Route::get('/social-target/create', array('as' => 'admin.social-target.create', 'uses' => 'AdminSocialTargetController@create'));
		Route::get('/social-target/{any}', array('as' => 'admin.social-target.show', 'uses' => 'AdminSocialTargetController@show'));
		Route::post('/social-target/create', array('as' => 'admin.social-target.create.post', 'uses' => 'AdminSocialTargetController@createPost'));
		Route::get('/social-target/{any}/update', array('as' => 'admin.social-target.update', 'uses' => 'AdminSocialTargetController@update'));
		Route::post('/social-target/update', array('as' => 'admin.social-target.update.post', 'uses' => 'AdminSocialTargetController@updatePost'));
		Route::get('/social-target/{any}/delete', array('as' => 'admin.social-target.delete', 'uses' => 'AdminSocialTargetController@delete'));
		Route::post('/social-target/{any}/delete', array('as' => 'admin.social-target.delete.post', 'uses' => 'AdminSocialTargetController@delete'));

		// SOCIAL ACTION
		Route::get('/social-action', array('as' => 'admin.social-action', 'uses' => 'AdminSocialActionController@index'));
		Route::get('/social-action/setphoto', array('as' => 'admin.social-action.setphoto', 'uses' => 'AdminSocialActionController@setphoto'));
		Route::get('/social-action/dropphoto', array('as' => 'admin.social-action.dropphoto', 'uses' => 'AdminSocialActionController@dropphoto'));
		Route::get('/social-action/create', array('as' => 'admin.social-action.create', 'uses' => 'AdminSocialActionController@create'));
		Route::get('/social-action/{any}', array('as' => 'admin.social-action.show', 'uses' => 'AdminSocialActionController@show'));
		Route::post('/social-action/create', array('as' => 'admin.social-action.create.post', 'uses' => 'AdminSocialActionController@createPost'));
		Route::get('/social-action/{any}/update', array('as' => 'admin.social-action.update', 'uses' => 'AdminSocialActionController@update'));
		Route::post('/social-action/update', array('as' => 'admin.social-action.update.post', 'uses' => 'AdminSocialActionController@updatePost'));
		Route::get('/social-action/{any}/delete', array('as' => 'admin.social-action.delete', 'uses' => 'AdminSocialActionController@delete'));
		Route::post('/social-action/{any}/delete', array('as' => 'admin.social-action.delete.post', 'uses' => 'AdminSocialActionController@delete'));


		// EVENT
		Route::get('/event', array('as' => 'admin.event', 'uses' => 'AdminEventController@index'));
		Route::get('/event/setphoto', array('as' => 'admin.event.setphoto', 'uses' => 'AdminEventController@setphoto'));
		Route::get('/event/dropphoto', array('as' => 'admin.event.dropphoto', 'uses' => 'AdminEventController@dropphoto'));
		Route::get('/event/create', array('as' => 'admin.event.create', 'uses' => 'AdminEventController@create'));
		Route::get('/event/{any}', array('as' => 'admin.event.show', 'uses' => 'AdminEventController@show'));
		Route::post('/event/create', array('as' => 'admin.event.create.post', 'uses' => 'AdminEventController@createPost'));
		Route::get('/event/{any}/update', array('as' => 'admin.event.update', 'uses' => 'AdminEventController@update'));
		Route::post('/event/update', array('as' => 'admin.event.update.post', 'uses' => 'AdminEventController@updatePost'));
		Route::get('/event/{any}/delete', array('as' => 'admin.event.delete', 'uses' => 'AdminEventController@delete'));
		Route::post('/event/{any}/delete', array('as' => 'admin.event.delete.post', 'uses' => 'AdminEventController@delete'));


		// USER
		Route::get('/user', 													array('as' => 'admin.user', 			'uses' => 'AdminUserController@index'));
		Route::get('/user/create', 												array('as' => 'admin.user.create', 		'uses' => 'AdminUserController@create'));
		Route::get('/user/{any}', 												array('as' => 'admin.user.show', 		'uses' => 'AdminUserController@show'));
		Route::post('/user/create', 											array('as' => 'admin.user.store', 		'uses' => 'AdminUserController@store'));
		Route::get('/user/{user}/update', 										array('as' => 'admin.user.update', 		'uses' => 'AdminUserController@update'));
		Route::post('/user/update', 											array('as' => 'admin.user.update.post', 'uses' => 'AdminUserController@updateDo'));
		Route::get('/user/{user}/delete', 										array('as' => 'admin.user.delete', 		'uses' => 'AdminUserController@delete'));
		Route::post('/user/delete', 											array('as' => 'admin.user.delete.post',	'uses' => 'AdminUserController@deleteDo'));

		// DONATION
		Route::get('/donation', 												array('as' => 'admin.donation', 			'uses' => 'AdminDonationController@index'));
		Route::get('/donation/create', 											array('as' => 'admin.donation.create', 		'uses' => 'AdminDonationController@create'));
		Route::get('/donation/{any}', 											array('as' => 'admin.donation.show', 		'uses' => 'AdminDonationController@show'));
		Route::post('/donation/create', 										array('as' => 'admin.donation.store', 		'uses' => 'AdminDonationController@store'));
		Route::get('/donation/{donation}/update', 								array('as' => 'admin.donation.update', 		'uses' => 'AdminDonationController@update'));
		Route::post('/donation/update', 										array('as' => 'admin.donation.update.post', 'uses' => 'AdminDonationController@updateDo'));
		Route::get('/donation/{donation}/delete', 								array('as' => 'admin.donation.delete', 		'uses' => 'AdminDonationController@delete'));
		Route::post('/donation/delete', 										array('as' => 'admin.donation.delete.post', 'uses' => 'AdminDonationController@deleteDo'));

		// PAYMENT
		Route::get('/payment/{any}', array('as' => 'admin.payment.show', 'uses' => 'AdminPaymentController@show'));
		Route::post('/payment/{any}/approve', array('as' => 'admin.payment.approve', 'uses' => 'AdminPaymentController@approve'));
		Route::post('/payment/{any}/delete', array('as' => 'admin.payment.delete', 'uses' => 'AdminPaymentController@delete'));

		Route::get('/report', array('as' => 'admin.report', 'uses' => 'AdminReportController@index'));
		Route::get('/report/{any}', array('as' => 'admin.report.show', 'uses' => 'AdminReportController@show'));

		// COUNTRY
		Route::get('/country', 													array('as' => 'admin.country', 				'uses' => 'AdminCountryController@index'));
		Route::get('/country/create', 											array('as' => 'admin.country.create', 		'uses' => 'AdminCountryController@create'));
		Route::get('/country/{any}', 											array('as' => 'admin.country.show', 		'uses' => 'AdminCountryController@show'));
		Route::post('/country/store', 											array('as' => 'admin.country.store', 		'uses' => 'AdminCountryController@store'));
		Route::get('/country/{country}/update', 								array('as' => 'admin.country.update', 		'uses' => 'AdminCountryController@update'));
		Route::post('/country/update', 											array('as' => 'admin.country.update.post', 	'uses' => 'AdminCountryController@updateDo'));
		Route::get('/country/{country}/delete', 								array('as' => 'admin.country.delete', 		'uses' => 'AdminCountryController@delete'));
		Route::post('/country/delete', 											array('as' => 'admin.country.delete.post', 	'uses' => 'AdminCountryController@deleteDo'));

		// CITY
		Route::get('/city', 													array('as' => 'admin.city', 			'uses' => 'AdminCityController@index'));
		Route::get('/city/create', 												array('as' => 'admin.city.create', 		'uses' => 'AdminCityController@create'));
		Route::get('/city/{any}', 												array('as' => 'admin.city.show', 		'uses' => 'AdminCityController@show'));
		Route::post('/city/store', 												array('as' => 'admin.city.store', 		'uses' => 'AdminCityController@store'));
		Route::get('/city/{city}/update', 										array('as' => 'admin.city.update', 		'uses' => 'AdminCityController@update'));
		Route::post('/city/update', 											array('as' => 'admin.city.update.post', 'uses' => 'AdminCityController@updateDo'));
		Route::get('/city/{city}/delete', 										array('as' => 'admin.city.delete', 		'uses' => 'AdminCityController@delete'));
		Route::post('/city/delete', 											array('as' => 'admin.city.delete.post', 'uses' => 'AdminCityController@deleteDo'));

		// SOCIAL TARGET CATEGORY
		Route::get('/social-target-category', 									array('as' => 'admin.social-target-category', 				'uses' => 'AdminSocialTargetCategoryController@index'));
		Route::get('/social-target-category/create', 							array('as' => 'admin.social-target-category.create',		'uses' => 'AdminSocialTargetCategoryController@create'));
		Route::get('/social-target-category/{any}', 							array('as' => 'admin.social-target-category.show', 			'uses' => 'AdminSocialTargetCategoryController@show'));
		Route::post('/social-target-category/store', 							array('as' => 'admin.social-target-category.store', 		'uses' => 'AdminSocialTargetCategoryController@store'));
		Route::get('/social-target-category/{social_target_category}/update',	array('as' => 'admin.social-target-category.update',		'uses' => 'AdminSocialTargetCategoryController@update'));
		Route::post('/social-target-category/update', 							array('as' => 'admin.social-target-category.update.post', 	'uses' => 'AdminSocialTargetCategoryController@updateDo'));
		Route::get('/social-target-category/{social_target_category}/delete', 	array('as' => 'admin.social-target-category.delete', 		'uses' => 'AdminSocialTargetCategoryController@delete'));
		Route::post('/social-target-category/delete', 							array('as' => 'admin.social-target-category.delete.post', 	'uses' => 'AdminSocialTargetCategoryController@deleteDo'));

		// SOCIAL ACTION CATEGORY
		Route::get('/social-action-category', 									array('as' => 'admin.social-action-category', 				'uses' => 'AdminSocialActionCategoryController@index'));
		Route::get('/social-action-category/create', 							array('as' => 'admin.social-action-category.create',		'uses' => 'AdminSocialActionCategoryController@create'));
		Route::get('/social-action-category/{any}', 							array('as' => 'admin.social-action-category.show', 			'uses' => 'AdminSocialActionCategoryController@show'));
		Route::post('/social-action-category/create', 							array('as' => 'admin.social-action-category.store', 		'uses' => 'AdminSocialActionCategoryController@store'));
		Route::get('/social-action-category/{social_action_category}/update', 	array('as' => 'admin.social-action-category.update', 		'uses' => 'AdminSocialActionCategoryController@update'));
		Route::post('/social-action-category/update', 							array('as' => 'admin.social-action-category.update.post', 	'uses' => 'AdminSocialActionCategoryController@updateDo'));
		Route::get('/social-action-category/{social_action_category}/delete',	array('as' => 'admin.social-action-category.delete', 		'uses' => 'AdminSocialActionCategoryController@delete'));
		Route::post('/social-action-category/delete', 							array('as' => 'admin.social-action-category.delete.post', 	'uses' => 'AdminSocialActionCategoryController@deleteDo'));
		Route::get('/social-action-category/{social_action_category}/delete',	array('as' => 'admin.social-action-category.delete', 		'uses' => 'AdminSocialActionCategoryController@delete'));

		// EVENT CATEGORY
		Route::get('/event-category', 											array('as' => 'admin.event-category', 				'uses' => 'AdminEventCategoryController@index'));
		Route::get('/event-category/create', 									array('as' => 'admin.event-category.create', 		'uses' => 'AdminEventCategoryController@create'));
		Route::get('/event-category/{any}', 									array('as' => 'admin.event-category.show', 			'uses' => 'AdminEventCategoryController@show'));
		Route::post('/event-category/create', 									array('as' => 'admin.event-category.store', 		'uses' => 'AdminEventCategoryController@store'));
		Route::get('/event-category/{event_category}/update', 					array('as' => 'admin.event-category.update', 		'uses' => 'AdminEventCategoryController@update'));
		Route::post('/event-category/update', 									array('as' => 'admin.event-category.update.post', 	'uses' => 'AdminEventCategoryController@updateDo'));
		Route::get('/event-category/{event_category}/delete', 					array('as' => 'admin.event-category.delete', 		'uses' => 'AdminEventCategoryController@delete'));
		Route::post('/event-category/delete', 									array('as' => 'admin.event-category.delete.post', 	'uses' => 'AdminEventCategoryController@deleteDo'));

		// PHOTOS
		Route::get('/photo', 													array('as' => 'admin.photo', 						'uses' => 'AdminPhotoController@index'));
		
		// multiple upload
		Route::post('/photo/multi', 													array('as' => 'admin.photo.multi', 						'uses' => 'AdminPhotoController@multi'));


		Route::any('/photo/ajax', 												array('as' => 'admin.ajax', 						'uses' => 'AdminPhotoController@ajax'));
		Route::get('/photo/create', 											array('as' => 'admin.photo.create', 				'uses' => 'AdminPhotoController@create'));
		Route::get('/photo/{photo}',											array('as' => 'admin.photo.show', 					'uses' => 'AdminPhotoController@show'));
		Route::post('/photo/create', 											array('as' => 'admin.photo.store', 					'uses' => 'AdminPhotoController@store'));
		Route::get('/photo/{photo}/update', 									array('as' => 'admin.photo.update', 				'uses' => 'AdminPhotoController@update'));
		Route::post('/photo/update', 											array('as' => 'admin.photo.update.post', 			'uses' => 'AdminPhotoController@updateDo'));
		Route::get('/photo/{photo}/delete', 									array('as' => 'admin.photo.delete', 				'uses' => 'AdminPhotoController@delete'));
		Route::post('/photo/delete', 											array('as' => 'admin.photo.delete.post', 			'uses' => 'AdminPhotoController@deleteDo'));

		// Route::get('/photo/multi', 											array('as' => 'admin.photo.delete.post', 			'uses' => 'AdminPhotoController@deleteDo'));


		// Route::post('/photo/uploadmulti', 										array('as' => 'admin.photo.uploadmulti.post', 			'uses' => 'AdminPhotoController@uploadmulti'));
		
		// NEWSLETTER
		Route::get('/newsletter', 												array('as' => 'admin.newsletter', 						'uses' => 'AdminNewsletterController@index'));
		Route::get('/newsletter/create', 										array('as' => 'admin.newsletter.create', 				'uses' => 'AdminNewsletterController@create'));
		Route::get('/newsletter/{any}', 										array('as' => 'admin.newsletter.show', 					'uses' => 'AdminNewsletterController@show'));
		Route::post('/newsletter/create', 										array('as' => 'admin.newsletter.store', 				'uses' => 'AdminNewsletterController@store'));
		Route::get('/newsletter/{newsletter}/update', 							array('as' => 'admin.newsletter.update', 				'uses' => 'AdminNewsletterController@update'));
		Route::post('/newsletter/update', 										array('as' => 'admin.newsletter.update.post', 			'uses' => 'AdminNewsletterController@updateDo'));
		Route::get('/newsletter/{newsletter}/delete', 							array('as' => 'admin.newsletter.delete', 				'uses' => 'AdminNewsletterController@delete'));
		Route::post('/newsletter/delete', 										array('as' => 'admin.newsletter.delete.post', 			'uses' => 'AdminNewsletterController@deleteDo'));

		// Route::get('/setting', array('as' => 'admin.setting', 'uses' => 'AdminSettingController@index'));

	});

});

// Home Controller

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
Route::post('/signup', array('as' => 'signup.post', 'uses' => 'HomeController@signup', 'before' => 'guest'));
Route::post('/signin', array('as' => 'signin', 'uses' => 'HomeController@signin', 'before' => 'guest'));
Route::get('/signin-with-fb', array('as' => 'signin-with-fb', 'uses' => 'HomeController@signinWithFacebook', 'before' => 'guest'));
Route::get('/signin-with-twitter', array('as' => 'signin-with-twitter', 'uses' => 'HomeController@signinWithTwitter', 'before' => 'guest'));
Route::get('/login', array('as' => 'login', 'uses' => 'HomeController@login', 'before' => 'guest'));
Route::get('/signup', array('as' => 'signup', 'uses' => 'HomeController@signup', 'before' => 'guest'));

Route::group(array('prefix' => 'setting','before' => 'auth'), function(){
	Route::get('/logout', array('as' => 'logout', 'uses' => 'HomeController@logout'));
	Route::get('/edit-profile', array('as' => 'edit_profile', 'uses' => 'UserController@editprofile'));
	Route::post('/update-profile', array('as' => 'update_profile', 'uses' => 'UserController@updateprofile'));
	Route::get('/edit-settings', array('as' => 'edit_settings', 'uses' => 'UserController@editsettings'));
	Route::post('/post-edit-settings', array('as' => 'post_edit_settings', 'uses' => 'UserController@posteditsettings'));

	// About donation
	Route::get('/riwayat-donasi', array('as' => 'riwayat-donasi', 'uses' => 'DonationController@index'));
});

// report
Route::post('/report', array('as' => 'report', 'uses' => 'ReportController@create'));

Route::group(array('before' => 'auth'), function(){
	// Donation
	Route::post('/delete-donation', array('as' => 'hapus-donasi', 'uses' => 'DonationController@delete'));
	Route::post('/donation-confirmation', array('as' => 'konfirmasi-donasi', 'uses' => 'PaymentController@create'));
});

// Donation
Route::post('/donation', array('as' => 'beri-donasi', 'uses' => 'DonationController@create'));
Route::get('/donation/status', array('as' => 'status-donasi', 'uses' => 'DonationController@status'));
Route::get('/donation/{any}', array('as' => 'lihat-donasi', 'uses' => 'DonationController@show'));


// Newsletter
Route::get('/newsletter/{any}', array('as' => 'lihat-newsletter', 'uses' => 'NewsletterController@show'));
Route::get('/newsletter/{any}/unsubscribe', array('as' => 'unsubscribe-newsletter', 'uses' => 'NewsletterController@unsubscribe'));


// Event
Route::get('/event', array('as' => 'temukan-event', 'uses' => 'EventController@index'));
Route::get('/event/{any}', array('as' => 'lihat-event', 'uses' => 'EventController@show'));
Route::get('/event/get/{any}', array('as' => 'get-event', 'uses' => 'EventController@getSession'));

Route::get('/daftarkan-event', array('as' => 'buat-event', 'uses' => 'EventController@create'));	
Route::post('/post-event', array('as' => 'buat-event.post', 'uses' => 'EventController@create_post'));
Route::get('/update-event', array('as' => 'buat-event.update', 'uses' => 'EventController@update_post'));


// Social Celebrity
Route::get('/selebriti-sosial', array('as' => 'selebriti-sosial', 'uses' => 'UserController@index'));

// Target Sosial (Social Target)
Route::get('/target-sosial', array('as' => 'temukan-target-sosial', 'uses' => 'SocialTargetController@index'));
Route::get('/target-sosial/{any}', array('as' => 'lihat-target-sosial', 'uses' => 'SocialTargetController@show'));
Route::get('/target-sosial/get/{any}', array('as' => 'get-target-sosial', 'uses' => 'SocialTargetController@getSession'));

Route::get('/daftarkan-target-sosial', array('as' => 'buat-target-sosial', 'uses' => 'SocialTargetController@create'));
Route::post('/daftarkan-target-sosial', array('as' => 'buat-target-sosial.post', 'uses' => 'SocialTargetController@create_post'));


// Aksi Sosial (Social Action)
Route::get('/aksi-sosial', array('as' => 'temukan-aksi-sosial', 'uses' => 'SocialActionController@index'));
Route::get('/aksi-sosial/{any}', array('as' => 'lihat-aksi-sosial', 'uses' => 'SocialActionController@show'));
Route::get('/aksi-sosial/get/{any}', array('as' => 'get-aksi-sosial', 'uses' => 'SocialActionController@getSession'));

Route::get('buat-aksi-sosial', array('as' => 'buat-aksi-sosial', 'uses' => 'SocialActionController@create'));
Route::post('buat-aksi-sosial/create', array('as' => 'buat-aksi-sosial.post', 'uses' => 'SocialActionController@create'));

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

// Konfirmasi pendaftaran
Route::get('/reg.conf={key}',function($key){
	$cipher = 'm4t4h4r1899';
	$iv = 'fedcba9876543210';
	$email = openssl_decrypt($key, 'AES-256-CBC', $cipher, 0, $iv);
	
	$user = User::where('email',$email)->where('status','!=',1);
	
	if($user->count()){
		// Merubah status user
		$user->update(array(
			'status'=>1
		));
		Session::flash('reg_finish',true);
		return Redirect::to('/signup/welcome');
	} else {
		return Redirect::to('/');
	}
})->where(array('key'=>'(.*)'));

// Halaman sambutan
Route::get('/signup/welcome',function(){
	if(!empty(Session::get('reg_finish'))){
		return View::make('bagikasih.user.welcome');
	} else {
		return Redirect::to('/');
	}
});

// User Profile
Route::get('/user/{any}', array('as' => 'lihat-profil', 'uses' => 'UserController@show'));

// Verytrans
Route::get('/payment',array('as' => 'cara-beri-donasi','uses' => 'PaymentController@index'));

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

	Route::get('/front', function()
	{
		return View::make('styleguide.front');
	});
});

