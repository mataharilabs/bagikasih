<?php

class EventCategory extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'event_categories';	
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
		return EventCategory::create($input);
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 				= EventCategory::findOrFail($input['id']);
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
		$data = EventCategory::findOrFail($id);		
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
		$count = Events::where('event_category_id', $id)->count();		

		if($count > 0)
		{
			return true;
		}
		return false;	
	}

	public static function getbyStatus() {
		$check = EventCategory::where('status',1)->count();
		if($check < 1){
			return false;
		}
		else{
			return EventCategory::where('status',1)->get();
		}
	}
}