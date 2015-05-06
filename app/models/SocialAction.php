<?php

class SocialAction extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_actions';

	protected $guarded = array('id');  // Important


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
	// 	return $this->belongsTo('SocialActionEvent','id','social_action_id');
	// }

	public function SocialActionCategory(){
		return $this->belongsTo('SocialActionCategory');
	}


	// public function socialTarget(){
	// 	return $this->belongsTo('SocialTarget');
	// }
	
	public static function getById($input){
		
		if(SocialAction::checkSlugName($input) == 1){

			return SocialAction::with('socialTarget','user')->where('slug',$input)->first();

		}
		else{
			
			return false;

		}

	}

	public static function checkSlugName($input){
		
		return SocialAction::where('slug',$input)->count();
	
	}

	public static function StoreSocialAction($input){
		
		$rules =  array(
			'name' => 'required',
			'description' => 'required|min:5',
			'stewardship' => 'required|min:5',
			'bank_account_description' => 'required|min:5',
			'currency' => 'required',
			'total_donation_target' => 'required',
			'total_donation' => 'required',
			'expired_at' => 'required',
		 );
		
		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	try {
	    		$SocialAction = new SocialAction;
	    		$SocialAction->fill($input);
	    		$SocialAction->save();

	    		// update 

				$photo = Photo::saveAvatar('social_actions', $SocialAction->id);


	    		$update = SocialAction::find($SocialAction->id);
				$update->fill(array(
				    'slug' => SocialAction::checkSlugName(Str::slug($input['name'])) > 0 ? 
				    strtolower(Str::slug($input['name'])).$SocialAction->id : 
				    strtolower(Str::slug($input['name'])),
				    'default_photo_id' => $photo['default_photo_id'],
				    'cover_photo_id' => $photo['cover_photo_id'],
				));
				$update->save();

	    		return "ok";
	    	} catch (Exception $e) {
	    		return "no";
	    	}

	    }
	}

	public function UpdateSocialAction($input,$id){

		$rules =  array(
			'name' => 'required',
			'description' => 'required|min:5',
			'stewardship' => 'required|min:5',
			'bank_account_description' => 'required|min:5',
			'currency' => 'required',
			'total_donation_target' => 'required',
			'total_donation' => 'required',
			'expired_at' => 'required',
		 );
		
		$validator = Validator::make($input, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	try {
	    		
	    		$SocialAction = SocialAction::find($id);
	    		$SocialAction->fill($input);
	    		$SocialAction->save();

	    		// update 

				$photo = Photo::updateAvatar($SocialAction->id,'social_actions');

	    		$update = SocialAction::find($SocialAction->id);
				
				$update->fill(array(
				    'slug' => SocialAction::checkSlugName(Str::slug($input['name'])) > 0 ? 
				    strtolower(Str::slug($input['name'])).$SocialAction->id : 
				    strtolower(Str::slug($input['name'])),
				    'default_photo_id' => $photo['default_photo_id'],
				    'cover_photo_id' => $photo['cover_photo_id'],
				));
				$update->save();

	    		return "ok";
	    	} catch (Exception $e) {
	    		return "no";
	    	}

	    }
	}

	public static function createSocialAction($input){
		
		$rules =  array(
			'name' => 'required',
			'stewardship' => 'required|min:10',
			'description' => 'required|min:10',
			'total_donation_target' => 'required|numeric',
			'expired_at' => 'required',
		 );

		$validator = Validator::make($input, $rules);

  	 	 if ($validator->fails()) {
  	 			return $validator->errors()->all();
	    } 
	    else {
	    	try {
	    		$SocialAction = new SocialAction;
	    		$SocialAction->fill($input);
	    		$SocialAction->save();

	    		// update 
	    		$update = SocialAction::find($SocialAction->id);
				$update->fill(array(
				    'slug' => SocialAction::checkSlugName(Str::slug($input['name'])) > 0 ? 
				    strtolower(Str::slug($input['name'])).$SocialAction->id : 
				    strtolower(Str::slug($input['name'])),
				));
				$update->save();

	    		return "ok";
	   
	    	} catch (Exception $e) {
	    		return "no";
	    	}
	    }
	}

}