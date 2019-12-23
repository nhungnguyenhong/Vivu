<?php
class IndexController extends BaseController {
	/*
	* Return index view
	*
	*/

	public function createView(){				

		//Random search key in home page
		$allSearchKey = Query::all();
		$randomSearchKey = new \Illuminate\Database\Eloquent\Collection;		
		$collectionKeySize = $allSearchKey->count();
		foreach($allSearchKey as $item){
			$rand = rand(1,2);
			if($rand == 1)
				$randomSearchKey->add($item);
		}

		//Random topic show in home page
		$listTopic = Topic::orderBy('tCreateAt')->get();
		$newestTopics = new \Illuminate\Database\Eloquent\Collection;		
		$collectionSize = $listTopic->count();
		foreach($listTopic as $item){
			$rand = rand(1,2);
			if($rand == 1)
				$newestTopics->add($item);
		}

		$placeTopics = Topic::where('tType', '=', '2')->get();
		$recipeTopics = Topic::where('tType', '=', '1')->get();

		$data = array(
			'newest' => $newestTopics,
			'place' => $placeTopics,
			'recipe' => $recipeTopics
			);

		return View::make('index')->with('recipeTopics', $recipeTopics)->
		with('placeTopics', $placeTopics)->
		with('newestTopics', $newestTopics)->
		with('randomSearchKey', $randomSearchKey);
	}
}