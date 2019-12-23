<?php

class User extends Eloquent{

	protected $table = 'users';	

	public function profiles()
    {
        return $this->hasMany('Profile');
    }
}
