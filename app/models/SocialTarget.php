<?php

class SocialTarget extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'social_targets';

	public function category()
	{
		return $this->belongsTo('SocialTargetCategory', 'social_target_category_id');
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

	public static function getById($id){
		return SocialTarget::find($id);
	}

	public static function add($input)
	{
		// for validation
		$validation = array(
			'Kategori' 				=> $input['social_target_category_id'],
			'Nama'					=> $input['name'],
			'Tentang_target_sosial' => $input['description'],
			'Kepengurusan' 			=> $input['stewardship'],
			'Kota'					=> $input['city_id'],
			'Alamat'				=> $input['address'],
			'No_telp'				=> $input['phone_number'],
			'Email'					=> $input['social_media_urls'],
			'Sosial_media'			=> $input['social_media_urls'],
		);

		$rules =  array(
			'Kategori'				=> 'required',
			'Kota'					=> 'required|exists:cities,id',
			'Tentang_target_sosial'	=> 'required|min:20',
			'Alamat'				=> 'required|max:100',
			'No_telp'				=> 'required|max:20',
		);

		// set user id
		if (Auth::check())
		{
			$input['user_id'] = Auth::user()->id;
		}

		$validator = Validator::make($validation, $rules);

  	  	if ($validator->fails()) {
  	 		return $validator->errors()->all();
	    } 
	    else {
	    	// try {

	    		$social_target = new SocialTarget;
	    		$social_target->fill($input);
	    		$social_target->save();

	    		// digunakan untuk mengambil id user yang belum login
				if(!Auth::check()) {
					Session::put('update_id',$social_target->id);
				}

	    		// update 
	    		$update = SocialTarget::find($social_target->id);
				$update->fill(array(
				    'slug' => SocialTarget::checkSlugName($input['name']) > 0 ? 
				    strtolower(str_replace(' ', '-', $input['name'])).$social_target->id : 
				    strtolower(str_replace(' ', '-', $input['name'])),
				));
				$update->save();
	    		return "ok";
	   
	    	// } catch (Exception $e) {
	    		// return "no";
	    	// }
	    }
	}

	public static function checkSlugName($input)
	{
		return SocialTarget::where('slug',$input)->count();	
	}
}