<?php

class City extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $fillable = ['country_id','name', 'status'];

	public function country()
	{
		return $this->belongsTo('Country');
	}

	public static function getAll()
	{
		return City::where('status',1)->get();
	}


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function add(array $input)
	{
		return City::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 				= City::findOrFail($input['id']);
		$data->name 		= $input['name'];
		$data->country_id	= $input['country_id'];
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
		$data = City::findOrFail($id);		
		return $data->delete();
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function isExist($id)
	{
		$count1 = SocialTarget::where('city_id', $id)->count();
		$count2 = SocialAction::where('city_id', $id)->count();
		$count3 = Events::where('city_id', $id)->count();
		$count4 = User::where('city_id', $id)->count();
		$count 	=	($count1 + $count2 + $count3 + $count4);

		if($count > 0)
		{
			return true;
		}
		return false;	
	}
}
