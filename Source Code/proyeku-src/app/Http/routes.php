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

    Route::resource('/profile', 'ProfilePageController', ['only' => ['index']]);    
});

Route::group(['middleware' => ['web']], function () {
    Route::resource('/job', 'JobPageController');
});

Route::group(['middleware' => ['web']], function () {

    Route::resource('/admin/manage/user', 'AdminUserController');
    Route::resource('/admin/manage/job', 'AdminJobController');

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