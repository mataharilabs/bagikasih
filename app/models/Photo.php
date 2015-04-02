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
			$post = new Photo;
		    $post->name 	     = $name;
		    $post->type_name  	 = 'users';
		    $post->type_id       = Auth::user()->id;
		    $post->status        = 1;
		    $post->save();
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