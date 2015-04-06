<?php

class Photo extends BaseModel {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';


	public static function recordImage($name){

		try {
			$check = Photo::where('type_id',Auth::user()->id)->count();
			if($check == 1){
				$getId = Photo::where('type_id',Auth::user()->id)->get();
				$update = Photo::find($getId[0]->id);
			    $update->name 	     = $name;
			    $update->type_name  	 = 'users';
			    $update->type_id       = Auth::user()->id;
			    $update->status        = 1;
			    $update->save();
			}	
			else{
				$post = new Photo;
			    $post->name 	     = $name;
			    $post->type_name  	 = 'users';
			    $post->type_id       = Auth::user()->id;
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