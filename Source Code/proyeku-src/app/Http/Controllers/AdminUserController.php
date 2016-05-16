<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\User;
use App\UserInfo;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    	$users = User::paginate(3);
    	$userinfo = UserInfo::all();
    	return View::make('admin.user.index')
    	->with('users', $users)
    	->with('userinfo', $userinfo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    	return View::make('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    	$user = new User;

    	$user->name     = Input::get('name');
    	$user->email    = Input::get('email');
    	$user->password = bcrypt(Input::get('password'));

    	$user->save();

    	$userinfo = new UserInfo;

    	$userinfo->user_id           = $user->id;
    	$userinfo->tanggal_lahir     = Input::get('tanggal_lahir');
    	$userinfo->alamat            = Input::get('alamat');
    	$userinfo->jenis_kelamin     = Input::get('jenis_kelamin');

    	$userinfo->save();

    	return Redirect::to('/admin/manage/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    	$user = User::find($id);
    	$userinfo = UserInfo::find($id);

    	return View::make('admin.user.show')
    	->with('user', $user)
    	->with('userinfo', $userinfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    	$user = User::find($id);
    	$userinfo = UserInfo::find($id);

    	return View::make('admin.user.edit')
    	->with('user',$user)
    	->with('userinfo', $userinfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    	$user = User::find($id);
    	$userinfo = UserInfo::find($id);

    	$user->name   = Input::get('name');
    	$user->email  = Input::get('email');

    	$userinfo->tanggal_lahir = Input::get('tanggal_lahir');
    	$userinfo->alamat        = Input::get('alamat');
    	$userinfo->jenis_kelamin = Input::get('jenis_kelamin');

    	$user->save();
    	$userinfo->save();

    	return Redirect::to('/admin/manage/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    	User::destroy($id);

    	return Redirect::to('/admin/manage/user');
    }
}
