<?php

class Events extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $guarded = array('id');  // Important

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
			'event_category_id'=> 'required',
			'city_id'=> 'required',
			'email'=> 'required|email',
			'name'=> 'required',
			'stewardship' => 'required|min:20',
			'description' => 'required|min:20',
			'location' => 'required',
			'website_url' => 'required|url',
			'social_media_urls' => 'required',
			'started_at' => 'required',
			'ended_at' => 'required',
		 );

		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	try {

	    		$event = new Events;
	    		$event->fill($input);
	    		$event->save();
	    		return "ok";
	   
	    	} catch (Exception $e) {
	    		return "no";
	    	}
	    }
	}
}