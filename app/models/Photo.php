<?php

class Photo extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';


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

        if(count($_FILES) > 0 && isset($_FILES)){

            if(!empty($_FILES["default_photo_id"]["tmp_name"])){

            	$post = new Photo;
			    $post->type_name  	 = $type_name;
			    $post->type_id       = $type_id;
			    $post->status        = 1;
			    $post->save();
			    $default_photo_id = $post->id;

                move_uploaded_file($_FILES["default_photo_id"]["tmp_name"],"./photo/" . $default_photo_id.'.jpg');
                
            }
            else{
                
                $default_photo_id = '';

            }

            if(!empty($_FILES["cover_photo_id"]["tmp_name"])){

                $post = new Photo;
			    $post->type_name  	 = $type_name;
			    $post->type_id       = $type_id;
			    $post->status        = 1;
			    $post->save();
			    $cover_photo_id = $post->id;

                move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],"./photo/" . $cover_photo_id.'.jpg');
                
            }            
            else{
                
                $cover_photo_id = '';

            }
      
            $res = array(
                        'default_photo_id' => $default_photo_id,
                        'cover_photo_id' => $cover_photo_id,
            );
       
            return $res;
       
        }
        else{

            $res = array(
                        'default_photo_id' => 0,
                        'cover_photo_id' => 0,
            );
      
            return $res;

        }

    }

    public function uploadAvatar($id,$tabel) {

        if (Photo::find($id)->count() == 1) 
        {
            $db = Photo::find($id)->first();

            return $db;
            

            // if(count($_FILES) > 0) {

            //     $data = array(
                
            //         'type_name' => $tabel,
                
            //         'type_id' => $id,
                
            //     );

            //     if(!empty($_FILES["default_photo_id"]["tmp_name"]) && $db['default_photo_id'] == 0){

            //         $this->db->insert('photos', $data);

            //         $default_photo_id = $this->db->insert_id();

            //         move_uploaded_file($_FILES["default_photo_id"]["tmp_name"],"./photo/" . $default_photo_id.'.jpg');

            //         $update = array('default_photo_id' => $default_photo_id);

            //         echo json_encode($update);

            //         $this->db->where('id',$id);

            //         $this->db->update($tabel,$update);

            //     }
            //     else{
                    
            //         move_uploaded_file($_FILES["default_photo_id"]["tmp_name"],"./photo/" . $db['default_photo_id'].'.jpg');

            //     }

            //     if(!empty($_FILES["cover_photo_id"]["tmp_name"]) && $db['cover_photo_id'] == 0){

            //         $this->db->insert('photos', $data);

            //         $cover_photo_id = $this->db->insert_id();
                    
            //         move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],"./photo/" . $cover_photo_id.'.jpg');
                    
            //         $update = array('cover_photo_id' => $cover_photo_id);
                    
            //         $this->db->where('id',$id);

            //         $this->db->update($tabel,$update);
                    
            //     }            
            //     else{
                    
            //         move_uploaded_file($_FILES["cover_photo_id"]["tmp_name"],"./photo/" . $db['cover_photo_id'].'.jpg');
                    
            //     }

            // }

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
}