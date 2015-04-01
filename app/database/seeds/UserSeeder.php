<?php

class UserSeeder extends Seeder{

	public function run()
	{
		$table = 'users';

		DB::table($table)->truncate();

		$data = array(
			0 => array(
				'id' 								=> 1,
				'default_photo_id' 					=> null,
				'city_id'							=> 2,
				'firstname'							=> 'Administrator',
				'lastname'							=> 'BagiKasih',
				'description'						=> '',
				'email'								=> 'admin@bagikasih.com',
				'password'							=> md5('m4t4h4r1899'),
				'phone_number'						=> '',
				'slug'								=> 'administrator',
				'birthday'							=> mktime(0,0,0,5,1,2015),
				'is_celebrity'						=> 0,
				'is_my_social_target_subscriber'	=> 1,
				'is_my_social_action_subscriber'	=> 1,
				'is_newsletter_subscriber'			=> 1,
				'status' 							=> 1,
				'created_at'						=> time(),
				'updated_at' 						=> time(),
			),
		);

		DB::table($table)->insert($data);
	}
}