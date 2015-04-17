<?php

class SocialActionCategory extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_action_categories';

	public static function getAll(){
		
		$check = SocialActionCategory::where('status',1)->count();

		if($check > 0){
			return SocialActionCategory::where('status',1)->get();			
		}
		else{
			return false;
		}
	}
}