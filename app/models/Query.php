<?php

class Query extends Eloquent {
	protected $table = 'query';	

	public function topics(){
		return $this->belongsToMany('Topic', 'istagged', 'tID', 'qID');		
	}
}