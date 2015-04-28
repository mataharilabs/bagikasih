<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		'Facebook' => array(
            'client_id'     => '386791004844525',
            'client_secret' => '1ab931e7db746293e9979cd58719430c',
            'scope'         => array('email'),
        ),		

        'Twitter' => array(
			'client_id'     => 'sJuNzdxwB6JbSN0uoWY7bNvua',
			'client_secret' => 'ppPeGXEtvKrIJZywrgi1wYGOkpnUyWEYENMzMKX0VrtFHC9iPR',
			// No scope - oauth1 doesn't need scope
		),
	)

);