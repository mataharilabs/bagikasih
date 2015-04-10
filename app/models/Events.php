<?php

class Events extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	public function category()
	{
		return $this->belongsTo('EventCategory', 'event_category_id');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function city()
	{
		return $this->belongsTo('City');
	}

	public function defaultPhoto()
	{
		return $this->belongsTo('Photo', 'default_photo_id');
	}

	public function coverPhoto()
	{
		return $this->belongsTo('Photo', 'cover_photo_id');
	}

	public static function createEvent($input) { 
		$rules =  array(
			'firstname'=> 'required',
			'lastname'=> 'required',
			'email'=> 'required|email',
			'phone_number'=> 'required',
			'slug' => 'required',
			'birthday' => 'required',
		 );

		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	// $user = User::create($input);
	    	// try {
	    	// 	$user = User::find(Auth::user()->id)->update($input);
	    	// 	return "ok";
	    	// } catch (Exception $e) {
	    	// 	return "no";
	    	// }
	    }
	}
}