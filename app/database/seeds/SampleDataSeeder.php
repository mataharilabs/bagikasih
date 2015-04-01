<?php

class SampleDataSeeder extends Seeder{

	public function run()
	{
		$this->socialTargetSample();
		$this->socialActionSample();
		$this->eventSample();
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
				'created_at'						=> time(),
				'updated_at' 						=> time(),
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
				'created_at'						=> time(),
				'updated_at' 						=> time(),
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
				'created_at'						=> time(),
				'updated_at' 						=> time(),
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
				'id' 			=> 1,
				'name' 			=> 'Event Umum',
				'status' 		=> 1,
				'created_at'	=> time(),
				'updated_at' 	=> time(),
			),
			1 => array(
				'id' 			=> 2,
				'name' 			=> 'Event Sosial',
				'status' 		=> 1,
				'created_at'	=> time(),
				'updated_at' 	=> time(),
			),
			2 => array(
				'id' 			=> 3,
				'name' 			=> 'Tantangan Sosial',
				'status' 		=> 1,
				'created_at'	=> time(),
				'updated_at' 	=> time(),
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
				'id' 			=> 1,
				'name' 			=> 'Event Umum',
				'status' 		=> 1,
				'created_at'	=> time(),
				'updated_at' 	=> time(),
			),
			1 => array(
				'id' 			=> 2,
				'name' 			=> 'Event Sosial',
				'status' 		=> 1,
				'created_at'	=> time(),
				'updated_at' 	=> time(),
			),
			2 => array(
				'id' 			=> 3,
				'name' 			=> 'Tantangan Sosial',
				'status' 		=> 1,
				'created_at'	=> time(),
				'updated_at' 	=> time(),
			),
		);

		DB::table($table)->insert($data);
	}

}