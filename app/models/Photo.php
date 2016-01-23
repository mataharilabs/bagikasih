<?php

class Photo extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $fillable = ['name', 'type_name', 'type_id', 'status'];

	 protected $guarded = array('id');

	public static function recordImage($user_id=0){

		$getId = '';
		try {
			

			if (Input::file('file')){

				  $check = Photo::where('type_id',Auth::user()->id)->count();
					
					if($check == 1){
						$getId = Photo::where('type_id',Auth::user()->id)->get();
						$getId = $getId[0]->id;
						$update = Photo::find($getId);
					    // $update->name 	     = $name;

					    $update->type_name  	 = 'users';
					    // By pass the login
						if(Auth::check()){
							$post->type_id  	 = Auth::user()->id;
						} else {
							$post->type_id  	 = $user_id;
						}
					    $update->status        = 1;
					    $update->save();
					}	
					else{
						$post = new Photo;
					    // $post->name 	     = $name;
					    $post->type_name  	 = 'users';
					    // By pass the login
						if(Auth::check()){
							$post->type_id  	 = Auth::user()->id;
						} else {
							$post->type_id  	 = $user_id;
						}
					    $post->status        = 1;
					    $post->save();
					    $getId = $post->id;
					}

			      $destinationPath = public_path().'/photos';

			      $extension = Input::file('file')->getClientOriginalExtension();
			      
			      // $fileName = rand(11111,99999).'.'.$extension; // renameing image
			      // $fileName = Auth::user()->id.'.'.$extension; // renameing image
			      
			      $fileName = $getId.'.'.$extension;

			      Input::file('file')->move($destinationPath, $fileName); // uploading file to given path

			}
			else {
				return "no";
			}
			return $getId;
		} catch (Exception $e){
			return "no";
		}
	}

	public static function saveAvatar($type_name,$type_id,$user_id=0)
    {
    	$res = array(
			'default_photo_id' => 0,
			'cover_photo_id' => 0,
		);
    	$lokasi = public_path().'/photos/';
    	
        if(count($_FILES) > 0 && isset($_FILES)){
			// Cover
            if(!empty($_FILES["cover_photo_id"]["tmp_name"])){
				$post = new Photo;
				// By pass the login
				if(Auth::check()){
					$post->user_id  	 = Auth::user()->id;
				} else {
					$post->user_id  	 = $user_id;
				}
				
				$post->type_name  	 = $type_name;
				$post->type_id       = $type_id;
				$post->status        = 1;
				$post->save();
				$cover_photo_id = $post->id;
				
				// Menjadikan cover di index 0 sebagai default cover
				if($res['cover_photo_id']==0) $res['cover_photo_id'] = $cover_photo_id;
				
				// Extension
				$ext = pathinfo($_FILES["cover_photo_id"]["name"],PATHINFO_EXTENSION);
				
				// Memindah semua cover yang terupload
				if(move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],$lokasi.$cover_photo_id.'.'.$ext)){
					$img = Image::make($lokasi.$cover_photo_id.'.'.$ext);
					if($ext!='jpg'){
						$img->encode('jpg',75);
						$img->save($lokasi.$cover_photo_id.'.jpg');
					}
					$img->fit(200);
					$img->save($lokasi.'thumb_'.$cover_photo_id.'.jpg');
					
					// Menghapus file lama setelah kita meng-convert-nya ke jpg
					if($ext!='jpg'){
						if(file_exists($lokasi.$cover_photo_id.'.'.$ext))
							unlink($lokasi.$cover_photo_id.'.'.$ext);
					}
				}
            }
			
			// Foto default
			if(!empty($_FILES["default_photo_id"]["tmp_name"])){
				// Menghitung semua foto yang diupload
				$count=count($_FILES["default_photo_id"]["tmp_name"]);
				
				// Loop
				for($i=0;$i < $count;++$i){
					$post = new Photo;
					if(Auth::check()){
						$post->user_id = Auth::user()->id;
					} else {
						$post->user_id = $user_id;
					}
					$post->type_name  	 = $type_name;
					$post->type_id       = $type_id;
					$post->status        = 1;
					$post->save();
					$default_photo_id = $post->id;
					
					// Menjadikan foto di index 0 sebagai default foto
					if($res['default_photo_id']==0) $res['default_photo_id'] = $default_photo_id;
					
					// Extension
					$ext = pathinfo($_FILES["default_photo_id"]["name"][$i],PATHINFO_EXTENSION);
					
					// Memindah semua foto yang terupload
					if(move_uploaded_file($_FILES["default_photo_id"]["tmp_name"][$i],$lokasi.$default_photo_id.'.'.$ext)){
						$img = Image::make($lokasi.$default_photo_id.'.'.$ext);
						if($ext!='jpg'){
							$img->encode('jpg',75);
							$img->save($lokasi.$default_photo_id.'.jpg');
						}
						$img->fit(200);
						$img->save($lokasi.'thumb_'.$default_photo_id.'.jpg');
						
						// Menghapus file lama setelah kita meng-convert-nya ke jpg
						if($ext!='jpg'){
							if(file_exists($lokasi.$default_photo_id.'.'.$ext))
								unlink($lokasi.$default_photo_id.'.'.$ext);
						}
					}
				}
            }
			
            return $res;
        }

    }

    public static function rollback() {
        
        // tempat upload photo
        $targetFolder = public_path().'/photos/';
        
        // cek apakah ada photo yang pernah terupload dengan user id tapi tidak jadi diupload
        $count = Photo::where('user_id',Auth::user()->id)
        			  ->whereNull('type_name')
                      ->whereNull('type_id')
                      ->count();
        
        if ($count > 0) {

        	$count = Photo::where('user_id',Auth::user()->id)
        			  ->whereNull('type_name')
                      ->whereNull('type_id')
                      ->get();

            // hapus file
            foreach ($query as $key){
				if(file_exists($targetFolder.'/'. $key['id'] . '.jpg'))
					unlink($targetFolder.'/'. $key['id'] . '.jpg');
            }
            
            // delete query
            Photo::where('user_id',Auth::user()->id)
        			  ->whereNull('type_name')
                      ->whereNull('type_id')
                      ->delete();
        
        }

    }


    public static function updatePhotos($type_name, $type_id) {
        
        $data = array('tmp' => 0, 'type_id' => $type_id, 'type_name' => $type_name);

        // update
		$update = Photo::where('user_id',Auth::user()->id)
        			   ->where('tmp',Session::get('time'))
                       ->update($data);        
        
        // unset time from controller
        Session::forget('time');
        Session::forget('validasi');
        
        return "ok";
    }



    public static function updateAvatar($db, $type_name, $type_id, $user_id = 0) {
    	$res = array();

    	$lokasi = public_path().'/photos/';

    	$cover_photo_id = '';
    	// jika melakukan upload
        if(count($_FILES) > 0 && isset($_FILES)){
        	
            if(!empty($_FILES["cover_photo_id"]["tmp_name"])){
				// Extension
				$ext = pathinfo($_FILES["cover_photo_id"]["name"],PATHINFO_EXTENSION);

            	// cover photo tidak pernah di upload
            	if(empty($db)){
	                $post = new Photo;
	                if(Auth::check()){
						$post->user_id = Auth::user()->id;
					} else {
						$post->user_id = $user_id;
					}
				    $post->type_name  	 = $type_name;
				    $post->type_id       = $type_id;
				    $post->status        = 1;
				    $post->save();
				    $cover_photo_id = $post->id;

	                if(move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],$lokasi.$cover_photo_id.'.'.$ext)){
						$img = Image::make($lokasi.$cover_photo_id.'.'.$ext);
						if($ext!='jpg'){
							$img->encode('jpg',75);
							$img->save($lokasi.$cover_photo_id.'.jpg');
						}
						$img->fit(200);
						$img->save($lokasi.'thumb_'.$cover_photo_id.'.jpg');
						
						// Menghapus file lama setelah kita meng-convert-nya ke jpg
						if($ext!='jpg'){
							if(file_exists($lokasi.$cover_photo_id.'.'.$ext))
								unlink($lokasi.$cover_photo_id.'.'.$ext);
						}
					}
            	}
            	// sudah pernah di upload
            	else {
					$post = new Photo;
	                $post->user_id  	 = Auth::user()->id;
				    $post->type_name  	 = $type_name;
				    $post->type_id       = $type_id;
				    $post->status        = 1;
				    $post->save();
				    $cover_photo_id = $post->id;

	                if(move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],$lokasi.$cover_photo_id.'.'.$ext)){
						$img = Image::make($lokasi.$cover_photo_id.'.'.$ext);
						if($ext!='jpg'){
							$img->encode('jpg',75);
							$img->save($lokasi.$cover_photo_id.'.jpg');
						}
						$img->fit(200);
						$img->save($lokasi.'thumb_'.$cover_photo_id.'.jpg');
						
						// Menghapus file lama setelah kita meng-convert-nya ke jpg
						if($ext!='jpg'){
							if(file_exists($lokasi.$cover_photo_id.'.'.$ext))
								unlink($lokasi.$cover_photo_id.'.'.$ext);
						}
					}
					// Removing the old file
					Photo::remove($db);
            	}
                
            }            
            else {
                
                $cover_photo_id = $db;

            }
      
            $res = array(
				'cover_photo_id' => $cover_photo_id,
            );
       
            return $res;
       
        }

    }

	public static function recordImageBy($type_name,$type_id){
		try {
			$check = Photo::where('type_name',$type_name)
							->where('type_id',$type_id)
							->count();

			if($check == 1){
				$getId = Photo::where('type_name',$type_name)
							->where('type_id',$type_id)->get();
				$update = Photo::find($getId[0]->id);
			    $update->name 	     = $name;
			    $update->type_name   = $type_name;
			    $update->type_id     = $type_id;
			    $update->status      = 1;
			    $update->save();
			}	
			else{
				$post = new Photo;
			    $post->name 	     = $name;
			    $post->type_name  	 = $type_name;
			    $post->type_id       = $type_id;
			    $post->status        = 1;
			    $post->save();
			}
			return "ok";
		} catch (Exception $e) {
			return "no";
		}
	}

	public static function getByUser($id){
		$getPhoto = Photo::where('type_name','users')->where('type_id',$id)->count();
		if($getPhoto == 1){
			return Photo::where('type_name','users')->where('type_id',$id)->get();
		}
		else{
			return false;
		}
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function listId($type_name)
	{
		$data = [];
		switch ($type_name) {
			case 'social_targets':
				# code...
				$data = SocialTarget::lists('name', 'id');				
				break;
			case 'social_actions':
				# code...
				$data = SocialAction::lists('name', 'id');				
				break;
			case 'events':
				# code...
				$data = Events::lists('name', 'id');				
				break;				
			default:
				$data = ['empty' => 'No Data'];
				break;
		}

		return $data;
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function add(array $input)
	{
		return Photo::create($input);
	}
	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public static function edit(array $input)
	{				
		$data 				= Photo::findOrFail($input['id']);
		$data->name 		= $input['name'];
		$data->type_name	= $input['type_name'];
		$data->type_id		= $input['type_id'];
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
		$lokasi = public_path().'/photos/';
		$data = Photo::where('id',$id)->first();
		if(is_null($data)===false){
			$data->delete();
			if(file_exists($lokasi.$id.'.jpg')) unlink($lokasi.$id.'.jpg');
			if(file_exists($lokasi.'thumb_'.$id.'.jpg')) unlink($lokasi.'thumb_'.$id.'.jpg');
		}
	}
}