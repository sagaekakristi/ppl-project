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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::get('/searchredirect', function(){
	$search = urlencode(e(Input::get('search')));
	$route = "search/$search";
	
	return redirect($route);
});

Route::get('search/{search}', 'SearchController@baseSearch');

Route::get('/advsearchredirect', function(){
    $search = urlencode(e(Input::get('search')));
    $lokasi = urlencode(e(Input::get('lokasi')));
    $kategori = urlencode(e(Input::get('kategori')));
    $upah_max = urlencode(e(Input::get('upah_max')));
    $upah_min = urlencode(e(Input::get('upah_min')));

    $route = "search/$search&&$lokasi&&$kategori&&$upah_max&&$upah_min";

    return redirect($route);
});

Route::get('search/{search}&&{lokasi}&&{kategori}&&{upah_max}&&{upah_min}', 'SearchController@search');
