<?php

class SocialTargetCategory extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_target_categories';
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
		return SocialTargetCategory::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 				= SocialTargetCategory::findOrFail($input['id']);
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
		$data = SocialTargetCategory::findOrFail($id);		
		return $data->delete();
	}
}