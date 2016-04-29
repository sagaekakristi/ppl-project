<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/admin', 'AdminController@index');

    Route::resource('/profile', 'ProfilePageController', ['only' => ['index']]);

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
});

Route::get('/searchredirect', function(){
	$search = urlencode(e(Input::get('search')));
	$route = "search/$search";
	
	return redirect($route);
});

Route::get('search/{search}', 'SearchController@search');

/*Route::get('/admin', ['middleware' => ['admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);*/