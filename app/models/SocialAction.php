<?php

class SocialAction extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_actions';

	public function socialTarget()
	{
		return $this->belongsTo('SocialTarget', 'social_target_id');
	}

	public function category()
	{
		return $this->belongsTo('SocialActionCategory', 'social_action_category_id');
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

	// public function socialActionEvent(){
	// 	return $this->hasMany('SocialActionEvent','id','social_action_id');
	// }
	
	public static function getById($input){
		
		if(SocialAction::checkSlugName($input) == 1){

			return SocialAction::with('socialTarget')->where('slug',$input)->first();

		}
		else{
			
			return false;

		}

	}

	public static function checkSlugName($input){
		
		return SocialAction::where('slug',$input)->count();
	
	}

	public static function createSocialAction($input){
		
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

  	 	//  if ($validator->fails()) {
  	 	// 		return $validator->errors()->all();
	   //  } 
	   //  else {
	   //  	try {

	   //  		$event = new Events;
	   //  		$event->fill($input);
	   //  		$event->save();

	   //  		// digunakan untuk mengambil id user yang belum login
				// if(!Auth::check()) {
				// 	Session::put('update_id',$event->id);
				// }
	   //  		// update 
	   //  		$update = Events::find($event->id);
				// $update->fill(array(
				//     'slug' => Events::checkSlugName($input['name']) > 0 ? 
				//     strtolower(str_replace(' ', '-', $input['name'])).$event->id : 
				//     strtolower(str_replace(' ', '-', $input['name'])),
				// ));
				// $update->save();
	   //  		return "ok";
	   
	   //  	} catch (Exception $e) {
	   //  		return "no";
	   //  	}
	   //  }
	}

}