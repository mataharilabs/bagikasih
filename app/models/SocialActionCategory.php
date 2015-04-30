<?php

class SocialActionCategory extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_action_categories';
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $fillable = ['name', 'status'];

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function add(array $input)
	{
		return SocialActionCategory::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 				= SocialActionCategory::findOrFail($input['id']);
		$data->name 		= $input['name'];		
		$data->status 		= $input['status'];
		return $data->save();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function remove($id)
	{
		$data = SocialActionCategory::findOrFail($id);		
		return $data->delete();
	}

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