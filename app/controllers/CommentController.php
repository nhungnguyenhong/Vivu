<?php

class CommentController extends Controller {

	public function doSave(){		

		$tID = Input::get('tID');
		$user = Input::get('user');		
		$comment = Input::get('comment');		

		if(is_integer(intval($tID)) && is_string($user)){			
			$item = new Comment();
			$item->tID = intval($tID);
			$item->usrID = $user;
			$item->content = $comment;

			$item->save();

			return Redirect::action('IndexController@createView');
		}else{
			return App::abort(403, 'Unauthorized action.');;
		}
	}

}