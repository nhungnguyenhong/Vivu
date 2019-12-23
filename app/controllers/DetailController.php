<?php

class DetailController extends BaseController {	

	public function showDetail(){

	$id = Input::get('id');
	if($id !== null){

		$topic = Topic::find($id);
		$relatedTopics = Topic::all();
		
		return View::make('details')->with('topic',$topic)->with('relatedTopics',$relatedTopics);
	}else{
		return View::make('404error');
	}	

	}

}