<?php

class Topic extends Eloquent {
	protected $table = 'topics';

	public function getAllPicPath(){
		$picPaths = $this->hasMany('PicDescription','tID');
		return $picPaths;
	}

	public function getAllComment(){
		$allComment = $this->hasMany('Comment','tID');
		if($allComment == null){
			return " ";
		}else{
			return $allComment;
		}
	}		
}