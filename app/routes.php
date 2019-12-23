<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'IndexController@createView');

Route::get('details{id?}', 'DetailController@showDetail');

Route::get('about', function()
{   
    return View::make('about');
});

Route::get('searchResults/{query}', 'SearchController@listResult');

Route::get('searchResults/{query?}', function(){
    if (Input::has('query'))
        {
            $query = Input::get('query'); 
            return Redirect::action('SearchController@listResult', array('$query' =>
$query));
        }else{
            $query = "";
        }       
});

Route::get('/catalog/{catalogName}', function($catalogName){

    $listTopics = new \Illuminate\Database\Eloquent\Collection;
    switch ($catalogName) {
        case 'catalog_01':
            $pageName = 'Địa chỉ ăn uống';
            $listTopics = Topic::where('tType', '=', 1)->get();            
            break;
        case 'catalog_02':
            $pageName = 'Địa chỉ vui chơi';
            $listTopics = Topic::where('tType', '=', 2)->get();            
            break;
        case 'catalog_03':
            $pageName = 'Khám phá địa điểm xung quanh bạn';
            $listTopics = Topic::where('tType', '=', 2)->get();            
            break;
        default:
            return 'error';
            break;
    }

    return View::make('catalog')->with('listTopics', $listTopics)->with('pageName', $pageName);
});

Route::get('/gallery', function(){
    $pictures = PicDescription::all();
    return View::make('gallery')->with('pictures', $pictures);
});

/*
|
|
|
*/
Route::get('/dev/allplace',function()
{
    // FIXME: Return nearest place
    $topics = Topic::all();
    return Response::json($topics);
});
Route::get('/dev/allquery{query?}',function()
{
    //Simple search
    $query = Input::get('query');

    $queries = Query::all();
    $queries = $queries -> filter(function($item) use (&$query)
    {
        
        if(strpos($item->value, $query) !== false)
            return true;
        else
            return false;
    }); 
    $result = array("query" => $query,"suggestions" => $queries);
    return Response::json($result);
});
Route::get('/dev/testquery',function(){
                
    return var_dump(Query::where('data', '=', '#gaixinh')->get()->find(1)->value);
});
/*
|Comment function
|
|
*/
Route::get('/dev/comment', 'CommentController@doSave');
/*
|Login with facebook
|
|
*/
Route::get('login/fb', function() {
    $facebook = new Facebook(Config::get('facebook'));
    $params = array(
        'redirect_uri' => url('/login/fb/callback'),
        'scope' => 'email',
    );
    return Redirect::away($facebook->getLoginUrl($params));
});
Route::get('login/fb/callback', function() {
    $code = Input::get('code');
    if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

    $facebook = new Facebook(Config::get('facebook'));
    $uid = $facebook->getUser();

    if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

    $me = $facebook->api('/me');

    $profile = Profile::whereUid($uid)->first();
    if (empty($profile)) {

        $user = new User;
        $user->name = $me['first_name'].' '.$me['last_name'];
        $user->email = $me['email'];
        $user->photo = 'https://graph.facebook.com/'.$me['username'].'/picture?type=large';

        $user->save();

        $profile = new Profile();
        $profile->uid = $uid;
        $profile->username = $me['username'];
        $profile = $user->profiles()->save($profile);
    }

    $profile->access_token = $facebook->getAccessToken();
    $profile->save();

    $user = $profile->user;

    Auth::login($user);

    return Redirect::to('/')->with('message', 'Logged in with Facebook');
});
Route::get('facebook', function()
{
    $data = array();

    if (Auth::check()) {
        $data = Auth::user();
    }
    return View::make('user', array('data'=>$data));
});

Route::get('facebook/logout', function() {
    Auth::logout();
    return Redirect::to('/facebook');
});