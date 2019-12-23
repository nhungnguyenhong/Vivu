<?php
class SearchController extends BaseController {
	/*
	* Show search result base on query
	*
	*/

	public function listResult($query){
		
		$subList = new \Illuminate\Database\Eloquent\Collection;
		//Get all tag of query
		$tagInQuery = array();
		preg_match_all("/(#[a-zA-Z0-9]*)/", $query, $tagInQuery);
		//Loop through query		
		$query = Query::where('value', '=', $query)->first();			
		if(is_null($query) == false){
			$subList = $subList->merge($query->topics);
		}		
		//Loop through list tags
		foreach ($tagInQuery[0] as $key => $item) {
			//FIXME:: return best result
			$query = Query::where('data', '=', $item)->first();			
			if(is_null($query) == false){
				$subList = $subList->merge($query->topics);
			}
		}

		return View::make('searchResults')->with('topics',$subList);
	}
}