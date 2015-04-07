<?php

class SampleDataSeeder extends Seeder{

	public function run()
	{
		$this->selebritySample();
		$this->socialTargetSample();
		$this->socialActionSample();
		$this->eventSample();
		$this->socialActionEventSample();
		$this->donationSample();
	}

	public function socialTargetSample()
	{
		$table = 'social_targets';

		DB::table($table)->truncate();

		$data = array(
			0 => array(
				'id' 								=> 1,
				'social_target_category_id' 		=> 1,
				'user_id'							=> 1,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Panti Asuhan X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Durian no.5 ABC',
				'phone_number'						=> '0123456789',
				'email'								=> 'pantiasuhanx@email.com',
				'social_media_urls'					=> 'facebook.com/pantiasuhanx; twitter.com/pantiasuhanx',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'pantiasuhanx',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 3,
				'status' 							=> 1,
				'created_at'						=> time() + 10,
				'updated_at' 						=> time() + 10,
			),
			1 => array(
				'id' 								=> 2,
				'social_target_category_id' 		=> 1,
				'user_id'							=> 1,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Panti Asuhan Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Durian no.5 DEF',
				'phone_number'						=> '0123456789',
				'email'								=> 'pantiasuhany@email.com',
				'social_media_urls'					=> 'facebook.com/pantiasuhany; instagram.com/pantiasuhanx',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'pantiasuhany',
				'currency'							=> 'IDR',
				'total_donation'					=> 10000000,
				'total_running_social_actions'		=> 2,
				'status' 							=> 1,
				'created_at'						=> time() + 20,
				'updated_at' 						=> time() + 20,
			),
			2 => array(
				'id' 								=> 3,
				'social_target_category_id' 		=> 1,
				'user_id'							=> 1,
				'city_id'							=> 3,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Panti Asuhan Z',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Semangka no.5 ABC',
				'phone_number'						=> '0123456789',
				'email'								=> 'pantiasuhanz@email.com',
				'social_media_urls'					=> 'facebook.com/pantiasuhanz;',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'pantiasuhanz',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 0,
				'status' 							=> 1,
				'created_at'						=> time() + 30,
				'updated_at' 						=> time() + 30,
			),
			3 => array(
				'id' 								=> 4,
				'social_target_category_id' 		=> 2,
				'user_id'							=> 1,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Panti Jompo X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Durian no.5 ABC',
				'phone_number'						=> '0123456789',
				'email'								=> 'pantijompox@email.com',
				'social_media_urls'					=> 'facebook.com/pantijompox; twitter.com/pantijompox',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'pantijompox',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 3,
				'status' 							=> 1,
				'created_at'						=> time() + 40,
				'updated_at' 						=> time() + 40,
			),
			4 => array(
				'id' 								=> 5,
				'social_target_category_id' 		=> 2,
				'user_id'							=> 1,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Panti Jompo Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Durian no.5 DEF',
				'phone_number'						=> '0123456789',
				'email'								=> 'pantijompoy@email.com',
				'social_media_urls'					=> 'facebook.com/pantijompoy; instagram.com/pantijompoy',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'pantijompoy',
				'currency'							=> 'IDR',
				'total_donation'					=> 10000000,
				'total_running_social_actions'		=> 2,
				'status' 							=> 1,
				'created_at'						=> time() + 50,
				'updated_at' 						=> time() + 50,
			),
			5 => array(
				'id' 								=> 6,
				'social_target_category_id' 		=> 2,
				'user_id'							=> 1,
				'city_id'							=> 3,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Panti Jompo Z',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Semangka no.5 ABC',
				'phone_number'						=> '0123456789',
				'email'								=> 'pantijompoz@email.com',
				'social_media_urls'					=> 'facebook.com/pantijompoz;',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'pantijompoz',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 0,
				'status' 							=> 1,
				'created_at'						=> time() + 60,
				'updated_at' 						=> time() + 70,
			),
			6 => array(
				'id' 								=> 7,
				'social_target_category_id' 		=> 3,
				'user_id'							=> 1,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Yayasan Difabel X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Durian no.5 ABC',
				'phone_number'						=> '0123456789',
				'email'								=> 'yayasandifabelx@email.com',
				'social_media_urls'					=> 'facebook.com/yayasandifabelx; twitter.com/yayasandifabelx',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'yayasandifabelx',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 3,
				'status' 							=> 1,
				'created_at'						=> time() + 80,
				'updated_at' 						=> time() + 80,
			),
			7 => array(
				'id' 								=> 8,
				'social_target_category_id' 		=> 3,
				'user_id'							=> 1,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Yayasan Difabel Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Durian no.5 DEF',
				'phone_number'						=> '0123456789',
				'email'								=> 'yayasandifabely@email.com',
				'social_media_urls'					=> 'facebook.com/yayasandifabely; instagram.com/yayasandifabely',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'yayasandifabely',
				'currency'							=> 'IDR',
				'total_donation'					=> 10000000,
				'total_running_social_actions'		=> 2,
				'status' 							=> 1,
				'created_at'						=> time() + 90,
				'updated_at' 						=> time() + 90,
			),
			8 => array(
				'id' 								=> 9,
				'social_target_category_id' 		=> 3,
				'user_id'							=> 1,
				'city_id'							=> 3,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Yayasan Difabel Z',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Jl. Semangka no.5 ABC',
				'phone_number'						=> '0123456789',
				'email'								=> 'yayasandifabelz@email.com',
				'social_media_urls'					=> 'facebook.com/yayasandifabelz;',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'yayasandifabelz',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 0,
				'status' 							=> 1,
				'created_at'						=> time() + 100,
				'updated_at' 						=> time() + 100,
			),
			9 => array(
				'id' 								=> 10,
				'social_target_category_id' 		=> 5,
				'user_id'							=> 1,
				'city_id'							=> 3,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Si A sakit keras',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'address'							=> 'Rumah Sakit AABB',
				'phone_number'						=> '0123456789',
				'email'								=> 'sia@email.com',
				'social_media_urls'					=> null,
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'sia',
				'currency'							=> 'IDR',
				'total_donation'					=> 0,
				'total_running_social_actions'		=> 1,
				'status' 							=> 1,
				'created_at'						=> time() + 110,
				'updated_at' 						=> time() + 110,
			),
		);

		DB::table($table)->insert($data);
	}

	public function socialActionSample()
	{
		$table = 'social_actions';

		DB::table($table)->truncate();

		$data = array(
			0 => array(
				'id' 								=> 1,
				'social_target_id'					=> 1,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 2,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana 2015 Panti Asuhan X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-2015-panti-asuhan-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 20000000,
				'total_donation'					=> 5000000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 120,
				'updated_at' 						=> time() + 120,
			),
			1 => array(
				'id' 								=> 2,
				'social_target_id'					=> 1,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 2,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana untuk Panti Asuhan X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-untuk-panti-asuhan-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 1000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 130,
				'updated_at' 						=> time() + 130,
			),
			2 => array(
				'id' 								=> 3,
				'social_target_id'					=> 1,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 2,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Charity Panti Asuhan X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'charity-panti-asuhan-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 2500000,
				'total_donation'					=> 750000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 140,
				'updated_at' 						=> time() + 140,
			),
			3 => array(
				'id' 								=> 4,
				'social_target_id'					=> 2,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 2,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana 2015 Panti Asuhan Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-2015-panti-asuhan-y',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 780000,
				'total_donation'					=> 150000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 150,
				'updated_at' 						=> time() + 150,
			),
			4 => array(
				'id' 								=> 5,
				'social_target_id'					=> 2,
				'social_action_category_id' 		=> 1,
				'user_id'							=> 2,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Biaya berobat untuk 1 anak di Panti Asuhan Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'biaya-berobat-untuk-1-anak-di-panti-asuhan-y',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 15000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 160,
				'updated_at' 						=> time() + 160,
			),
			5 => array(
				'id' 								=> 6,
				'social_target_id'					=> 4,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 2,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana 2015 Panti Jompo X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-2015-panti-jompo-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 20000000,
				'total_donation'					=> 5000000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 170,
				'updated_at' 						=> time() + 170,
			),
			6 => array(
				'id' 								=> 7,
				'social_target_id'					=> 4,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 3,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana untuk Panti Jompo X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-untuk-panti-jompo-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 1000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 180,
				'updated_at' 						=> time() + 180,
			),
			7 => array(
				'id' 								=> 8,
				'social_target_id'					=> 4,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 3,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Charity Panti Jompo X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'charity-panti-jompo-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 2500000,
				'total_donation'					=> 750000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 190,
				'updated_at' 						=> time() + 190,
			),
			8 => array(
				'id' 								=> 9,
				'social_target_id'					=> 5,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 3,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana 2015 Panti Jompo Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-2015-panti-jompo-y',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 780000,
				'total_donation'					=> 150000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 200,
				'updated_at' 						=> time() + 200,
			),
			9 => array(
				'id' 								=> 10,
				'social_target_id'					=> 5,
				'social_action_category_id' 		=> 1,
				'user_id'							=> 3,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Biaya berobat untuk 1 anak di Panti Jompo Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'biaya-berobat-untuk-1-anak-di-panti-jompo-y',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 15000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 210,
				'updated_at' 						=> time() + 210,
			),
			10 => array(
				'id' 								=> 11,
				'social_target_id'					=> 7,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 3,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana 2015 Yayasan Difabel X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-2015-yayasan-difabel-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 20000000,
				'total_donation'					=> 5000000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 220,
				'updated_at' 						=> time() + 220,
			),
			11 => array(
				'id' 								=> 12,
				'social_target_id'					=> 7,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 3,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana untuk Yayasan Difabel X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-untuk-yayasan-difabel-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 1000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 230,
				'updated_at' 						=> time() + 230,
			),
			12 => array(
				'id' 								=> 13,
				'social_target_id'					=> 7,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 4,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Charity Yayasan Difabel X',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'charity-yayasan-difabel-x',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 2500000,
				'total_donation'					=> 750000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 240,
				'updated_at' 						=> time() + 240,
			),
			13 => array(
				'id' 								=> 14,
				'social_target_id'					=> 8,
				'social_action_category_id' 		=> 2,
				'user_id'							=> 4,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Galang Dana 2015 Yayasan Difabel Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'galang-dana-2015-yayasan-difabel-y',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 780000,
				'total_donation'					=> 150000,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 250,
				'updated_at' 						=> time() + 250,
			),
			14 => array(
				'id' 								=> 15,
				'social_target_id'					=> 8,
				'social_action_category_id' 		=> 1,
				'user_id'							=> 4,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Biaya berobat untuk 1 anak di Yaysan Difabel Y',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'biaya-berobat-untuk-1-anak-di-yayasan-difabel-y',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 15000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 260,
				'updated_at' 						=> time() + 260,
			),
			15 => array(
				'id' 								=> 16,
				'social_target_id'					=> 10,
				'social_action_category_id' 		=> 1,
				'user_id'							=> 4,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Yuk bantu biaya berobat si A',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'yuk-bantu-biaya-berobat-si-a',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 150000000,
				'total_donation'					=> 0,
				'expired_at'						=> time() + (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 270,
				'updated_at' 						=> time() + 270,
			),
			16 => array(
				'id' 								=> 17,
				'social_target_id'					=> 10,
				'social_action_category_id' 		=> 1,
				'user_id'							=> 4,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Koin untuk si A',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'bank_account_description'			=> 'BCA 1111111111 a/n Saya Sendiri',
				'slug'								=> 'koin-untuk-si-a',
				'currency'							=> 'IDR',
				'total_donation_target'				=> 20000000,
				'total_donation'					=> 25000000,
				'expired_at'						=> time() - (7*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 280,
				'updated_at' 						=> time() + 280,
			),
		);

		DB::table($table)->insert($data);	
	}

	public function eventSample()
	{
		$table = 'events';

		DB::table($table)->truncate();

		$data = array(
			0 => array(
				'id' 								=> 1,
				'event_category_id' 				=> 2,
				'user_id'							=> 1,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Charity Night Tahun Baru',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'location'							=> 'Jl. Durian no.5 ABC',
				'email'								=> 'event1@email.com',
				'website_url'						=> 'www.event1.com',
				'social_media_urls'					=> 'facebook.com/event1; twitter.com/event1',
				'slug'								=> 'charity-night-tahun-baru',
				'started_at'						=> time() - (7*24*60*60),
				'ended_at'							=> time() - (2*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 290,
				'updated_at' 						=> time() + 290,
			),
			1 => array(
				'id' 								=> 2,
				'event_category_id' 				=> 1,
				'user_id'							=> 1,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'HUT Kemerdekaan RI',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'location'							=> 'Jl. Durian no.5 ABC',
				'email'								=> 'event2@email.com',
				'website_url'						=> 'www.event2.com',
				'social_media_urls'					=> 'facebook.com/event2; twitter.com/event2',
				'slug'								=> 'hut-kemerdekaan-ri',
				'started_at'						=> time() + (7*24*60*60),
				'ended_at'							=> time() + (12*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 300,
				'updated_at' 						=> time() + 300,
			),
			2 => array(
				'id' 								=> 3,
				'event_category_id' 				=> 2,
				'user_id'							=> 1,
				'city_id'							=> 2,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Pertamina Bazzar Day',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'location'							=> 'Jl. Durian no.5 ABC',
				'email'								=> 'event3@email.com',
				'website_url'						=> 'www.event3.com',
				'social_media_urls'					=> 'facebook.com/event3; twitter.com/event3',
				'slug'								=> 'pertamina-bazzar-day',
				'started_at'						=> time() - (7*24*60*60),
				'ended_at'							=> time() + (2*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 310,
				'updated_at' 						=> time() + 310,
			),
			3 => array(
				'id' 								=> 4,
				'event_category_id' 				=> 2,
				'user_id'							=> 1,
				'city_id'							=> 1,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Valentine Fundraising for Cancer',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'location'							=> 'Jl. Durian no.5 ABC',
				'email'								=> 'event4@email.com',
				'website_url'						=> 'www.event4.com',
				'social_media_urls'					=> 'facebook.com/event4; twitter.com/event4',
				'slug'								=> 'valentine-fundraising-for-cancer',
				'started_at'						=> time(),
				'ended_at'							=> time() + (2*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 320,
				'updated_at' 						=> time() + 320,
			),
			4 => array(
				'id' 								=> 5,
				'event_category_id' 				=> 3,
				'user_id'							=> 1,
				'city_id'							=> 3,
				'default_photo_id'					=> null,
				'cover_photo_id'					=> null,
				'name'								=> 'Ice Bucket Challenge',
				'description'						=> 'Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'stewardship'						=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat',
				'location'							=> 'Jl. Durian no.5 ABC',
				'email'								=> 'event5@email.com',
				'website_url'						=> 'www.event5.com',
				'social_media_urls'					=> 'facebook.com/event5; twitter.com/event5',
				'slug'								=> 'ice-bucket-challenge',
				'started_at'						=> time() - (3*24*60*60),
				'ended_at'							=> time() + (2*24*60*60),
				'status' 							=> 1,
				'created_at'						=> time() + 330,
				'updated_at' 						=> time() + 330,
			),
		);

		DB::table($table)->insert($data);
	}

	public function socialActionEventSample()
	{
		$table = 'social_action_events';

		DB::table($table)->truncate();

		$data = array(
			0 => array(
				'social_action_id' 	=> 1,
				'event_id' 			=> 1,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 340,
				'updated_at'		=> time() + 340,
			),
			1 => array(
				'social_action_id' 	=> 2,
				'event_id' 			=> 1,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 350,
				'updated_at'		=> time() + 350,
			),
			3 => array(
				'social_action_id' 	=> 1,
				'event_id' 			=> 2,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 360,
				'updated_at'		=> time() + 360,
			),
			4 => array(
				'social_action_id' 	=> 2,
				'event_id' 			=> 2,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 370,
				'updated_at'		=> time() + 370,
			),
			5 => array(
				'social_action_id' 	=> 3,
				'event_id' 			=> 3,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 380,
				'updated_at'		=> time() + 380,
			),
			6 => array(
				'social_action_id' 	=> 2,
				'event_id' 			=> 3,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 390,
				'updated_at'		=> time() + 390,
			),
			7 => array(
				'social_action_id' 	=> 3,
				'event_id' 			=> 1,
				'user_id' 			=> 1,
				'status'			=> 1,
				'created_at'		=> time() + 400,
				'updated_at'		=> time() + 400,
			),
		);

		DB::table($table)->insert($data);
	}

	public function donationSample()
	{
		$table = 'donations';

		DB::table($table)->truncate();

		$data = array(
			0 => array(
				'user_id' 		=> 1,
				'type_name' 	=> 'social_targets',
				'type_id'		=> 1,
				'currency'		=> 'IDR',
				'total'			=> 50000,
				'message'		=> 'Ini contoh pesan',
				'bank_name'		=> 'BCA',
				'bank_branch'	=> 'Mulyosari',
				'bank_account'	=> '112233445566',
				'city_id'		=> 2,
				'as_noname'		=> 0,
				'status'		=> 1,
				'created_at'	=> time() + 410,
				'updated_at'	=> time() + 410,
			),
			1 => array(
				'user_id' 		=> 1,
				'type_name' 	=> 'social_targets',
				'type_id'		=> 2,
				'currency'		=> 'IDR',
				'total'			=> 120000,
				'message'		=> 'Ini contoh pesan',
				'bank_name'		=> 'BCA',
				'bank_branch'	=> 'Mulyosari',
				'bank_account'	=> '112233445566',
				'city_id'		=> 2,
				'as_noname'		=> 1,
				'status'		=> 1,
				'created_at'	=> time() + 420,
				'updated_at'	=> time() + 420,
			),
			2 => array(
				'user_id' 		=> 1,
				'type_name' 	=> 'social_targets',
				'type_id'		=> 1,
				'currency'		=> 'IDR',
				'total'			=> 200000,
				'message'		=> 'Ini contoh pesan',
				'bank_name'		=> 'BCA',
				'bank_branch'	=> 'Mulyosari',
				'bank_account'	=> '112233445566',
				'city_id'		=> 2,
				'as_noname'		=> 0,
				'status'		=> 0,
				'created_at'	=> time() + 430,
				'updated_at'	=> time() + 430,
			),
			3 => array(
				'user_id' 		=> 1,
				'type_name' 	=> 'social_actions',
				'type_id'		=> 1,
				'currency'		=> 'IDR',
				'total'			=> 50000,
				'message'		=> 'Ini contoh pesan',
				'bank_name'		=> 'BCA',
				'bank_branch'	=> 'Mulyosari',
				'bank_account'	=> '112233445566',
				'city_id'		=> 2,
				'as_noname'		=> 0,
				'status'		=> 1,
				'created_at'	=> time() + 440,
				'updated_at'	=> time() + 440,
			),
			4 => array(
				'user_id' 		=> 1,
				'type_name' 	=> 'social_actions',
				'type_id'		=> 2,
				'currency'		=> 'IDR',
				'total'			=> 120000,
				'message'		=> 'Ini contoh pesan',
				'bank_name'		=> 'BCA',
				'bank_branch'	=> 'Mulyosari',
				'bank_account'	=> '112233445566',
				'city_id'		=> 2,
				'as_noname'		=> 1,
				'status'		=> 1,
				'created_at'	=> time() + 450,
				'updated_at'	=> time() + 450,
			),
			5 => array(
				'user_id' 		=> 1,
				'type_name' 	=> 'social_actions',
				'type_id'		=> 1,
				'currency'		=> 'IDR',
				'total'			=> 200000,
				'message'		=> 'Ini contoh pesan',
				'bank_name'		=> 'BCA',
				'bank_branch'	=> 'Mulyosari',
				'bank_account'	=> '112233445566',
				'city_id'		=> 2,
				'as_noname'		=> 0,
				'status'		=> 0,
				'created_at'	=> time() + 460,
				'updated_at'	=> time() + 460,
			),
		);

		DB::table($table)->insert($data);
	}

	public function selebritySample()
	{
		$table = 'users';

		DB::table($table)->where('id', '!=', 1)->delete();

		$data = array(
			0 => array(
				'id'								=> 2,
				'default_photo_id' 					=> null,
				'city_id'							=> 1,
				'firstname'							=> 'Selebriti',
				'lastname'							=> '1',
				'description'						=> 'Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'email'								=> 'selebriti1@email.com',
				'password'							=> md5('selebriti1'),
				'phone_number'						=> '',
				'slug'								=> 'selebriti1',
				'birthday'							=> mktime(0,0,0,5,1,2015),
				'is_celebrity'						=> 1,
				'is_my_social_target_subscriber'	=> 1,
				'is_my_social_action_subscriber'	=> 1,
				'is_newsletter_subscriber'			=> 1,
				'total_running_social_actions'		=> 6,
				'status' 							=> 1,
				'created_at'						=> time(),
				'updated_at' 						=> time(),
			),
			1 => array(
				'id'								=> 3,
				'default_photo_id' 					=> null,
				'city_id'							=> 2,
				'firstname'							=> 'Selebriti',
				'lastname'							=> '2',
				'description'						=> 'Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'email'								=> 'selebriti2@email.com',
				'password'							=> md5('selebriti2'),
				'phone_number'						=> '',
				'slug'								=> 'selebriti2',
				'birthday'							=> mktime(0,0,0,5,1,2015),
				'is_celebrity'						=> 1,
				'is_my_social_target_subscriber'	=> 1,
				'is_my_social_action_subscriber'	=> 1,
				'is_newsletter_subscriber'			=> 1,
				'total_running_social_actions'		=> 6,
				'status' 							=> 1,
				'created_at'						=> time(),
				'updated_at' 						=> time(),
			),
			2 => array(
				'id'								=> 4,
				'default_photo_id' 					=> null,
				'city_id'							=> 3,
				'firstname'							=> 'Selebriti',
				'lastname'							=> '3',
				'description'						=> 'Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
				'email'								=> 'selebriti3@email.com',
				'password'							=> md5('selebriti3'),
				'phone_number'						=> '',
				'slug'								=> 'selebriti3',
				'birthday'							=> mktime(0,0,0,5,1,2015),
				'is_celebrity'						=> 1,
				'is_my_social_target_subscriber'	=> 1,
				'is_my_social_action_subscriber'	=> 1,
				'is_newsletter_subscriber'			=> 1,
				'total_running_social_actions'		=> 5,
				'status' 							=> 1,
				'created_at'						=> time(),
				'updated_at' 						=> time(),
			),
		);

		DB::table($table)->insert($data);
	}
}