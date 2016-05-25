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

    Route::get('/fbred', 'SocialAuthController@redirect');
    Route::get('/callback', 'SocialAuthController@callback');

    Route::get( '/search', 'SearchController@search');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('/job', 'JobPageController');
    Route::post('/send-job-request', 'JobRequestController@requestJob');
    Route::get('/show-job-request', 'JobRequestController@showAllRequest');
    Route::post('/accept-job-request', 'JobRequestController@acceptJob');
    
    Route::get('/freelancer/accepted', 'AcceptedJobController@freelancerIndex');
    Route::post('/freelancer/accepted/requestdone', 'AcceptedJobController@freelancerRequestDone');
    Route::get('/freelancer/accepted/{id}', 'AcceptedJobController@freelancerShow');
    Route::get('/freelancer/accepted/{id}/edit', 'AcceptedJobController@freelancerEdit');

    Route::get('/seeker/accepted', 'AcceptedJobController@seekerIndex');
    Route::post('/seeker/accepted/requestdone', 'AcceptedJobController@seekerRequestDone');
    Route::get('/seeker/accepted/{id}', 'AcceptedJobController@seekerShow');
    Route::get('/seeker/accepted/{id}/edit', 'AcceptedJobController@seekerEdit');

    Route::post('/freelancerseeker/update', 'AcceptedJobController@update');

});

Route::group(['middleware' => ['web']], function () {
    Route::resource('/message', 'MessagingController', ['only' => ['index', 'create', 'store', 'show']]);
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/notification', 'NotificationController@index');
});

Route::group(['middleware' => ['web']], function () { 
    Route::get('/profile', 'ProfilePageController@index');
    Route::get('/profile/edit/account', 'ProfilePageController@editAccount');
    Route::get('/profile/edit/info', 'ProfilePageController@editInfo');
    Route::get('/profile/view/skill', 'ProfilePageController@viewSkill');
    Route::post('/profile/delete/skill', 'ProfilePageController@deleteSkill');
    Route::put('/profile/update/account', 'ProfilePageController@updateAccount');
    Route::put('/profile/update/info', 'ProfilePageController@updateInfo');
    Route::get('/profile/create/skill', 'ProfilePageController@createSkill');
    Route::get('/profile/create/info', 'ProfilePageController@createInfo');
    Route::post('/profile/add/skill', 'ProfilePageController@addSkill');
    Route::post('/profile/add/info', 'ProfilePageController@addInfo');
    Route::put('/profile/update/upload', 'ProfilePageController@upload');
    Route::resource('/profile/view', 'ProfilePageController@directToProfile'); 
}); 

Route::group(['middleware' => ['web']], function () {

    Route::resource('/admin/manage/user', 'AdminUserController');
    Route::resource('/admin/manage/user/search', 'AdminUserController@index');
    Route::resource('/admin/manage/job', 'AdminJobController');
    Route::resource('/admin/manage/job/search', 'AdminJobController@index');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
});