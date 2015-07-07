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

	public static function recordImage(){

		$getId = '';
		try {
			

			if (Input::file('file')) {

				  $check = Photo::where('type_id',Auth::user()->id)->count();
					
					if($check == 1){
						$getId = Photo::where('type_id',Auth::user()->id)->get();
						$getId = $getId[0]->id;
						$update = Photo::find($getId);
					    // $update->name 	     = $name;
					    $update->type_name  	 = 'users';
					    $update->type_id       = Auth::user()->id;
					    $update->status        = 1;
					    $update->save();
					}	
					else{
						$post = new Photo;
					    // $post->name 	     = $name;
					    $post->type_name  	 = 'users';
					    $post->type_id       = Auth::user()->id;
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
			else{
				
				return "no";

			}
			return $getId;
		} catch (Exception $e) {
			return "no";
		}
	}

	public static function saveAvatar($type_name, $type_id) 
    {
    	$res = array();

    	$lokasi = public_path().'/photos/';

    	$cover_photo_id = '';
    	
        if(count($_FILES) > 0 && isset($_FILES)){
        	
            if(!empty($_FILES["cover_photo_id"]["tmp_name"])){

                $post = new Photo;
			    $post->type_name  	 = $type_name;
			    $post->type_id       = $type_id;
			    $post->status        = 1;
			    $post->save();
			    $cover_photo_id = $post->id;

                move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],$lokasi. $cover_photo_id.'.jpg');
                
            }            
            else{
                
                $cover_photo_id = '';

            }
      
            $res = array(
                        // 'default_photo_id' => $default_photo_id,
                        'cover_photo_id' => $cover_photo_id,
            );
       
            return $res;
       
        }

    }

    public static function updateAvatar($db, $type_name, $type_id) {
    	$res = array();

    	$lokasi = public_path().'/photos/';

    	$cover_photo_id = '';
    	// jika melakukan upload
        if(count($_FILES) > 0 && isset($_FILES)){
        	
            if(!empty($_FILES["cover_photo_id"]["tmp_name"])){

            	// cover photo tidak pernah di upload
            	if(empty($db)) {
	                $post = new Photo;
				    $post->type_name  	 = $type_name;
				    $post->type_id       = $type_id;
				    $post->status        = 1;
				    $post->save();
				    $cover_photo_id = $post->id;

	                move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],$lokasi. $cover_photo_id.'.jpg');
            	}
            	// sudah pernah di upload
            	else{

            		$cover_photo_id = $db;
	                move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],$lokasi. $cover_photo_id.'.jpg');

            	}
                
            }            
            else{
                
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
		$data = Photo::findOrFail($id);		
		return $data->delete();
	}
}