<?php

class Country extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'countries';
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
		return Country::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{		
		$country 			= Country::findOrFail($input['id']);
		$country->name 		= $input['name'];
		$country->status 	= $input['status'];
		return $country->save();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function remove($id)
	{
		$country = Country::findOrFail($id);		
		return $country->delete();
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function optionsCountry()
	{
		return Country::where('status',1)->lists('name', 'id');
	}
}