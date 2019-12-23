<?php

class PicDescription extends Eloquent{
	protected $table = 'picDes';

	public function getTopic(){
		return $this->belongsTo('Topic','id');
	}	
}