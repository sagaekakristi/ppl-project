<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\UserInfo;
use App\FreelancerInfo;
use App\Job;
use App\JobCategory;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Input;
use Session;
use Validator;
use View;

class ProfilePageController extends Controller
{
    /**
     * Show a list of all available flights.
     *
     * @return Response
     */
    public function index()
    {
    	$logged_user_id = Auth::user()->id;
        $user_info = UserInfo::find($logged_user_id);
        $users = User::find($logged_user_id);
        
        $alamat = $user_info->alamat;
        $tanggal_lahir = $user_info->tanggal_lahir;
        $jenis_kelamin = $user_info->jenis_kelamin;
        $nama = $users->name;

        $user_info = UserInfo::find($logged_user_id);
        $freelancer_info = FreelancerInfo::find($user_info->user_id);
        /*$jobs;
        if(Job::where('freelancer_info_id', $freelancer_info->user_info_id)->get()) {
            $jobs = Job::where('freelancer_info_id', $freelancer_info->user_info_id)->get();
        }*/


        return View::make('profile')
        //->with('jobs', $jobs)
        ->with('user_info', $user_info)
        ->with('users', $users);
    }
    public function editAccount() 
    { 
        $logged_user_id = Auth::user()->id; 
        $user_info = UserInfo::find($logged_user_id); 
        $user = user::find($user_info->user_id); 

        return View::make('account') 
        ->with('user', $user); 
    } 

    public function editInfo() 
    { 
        $logged_user_id = Auth::user()->id; 
        $user_info = UserInfo::find($logged_user_id); 
        $user = user::find($user_info->user_id); 

        return View::make('info') 
        ->with('user_info', $user_info);
    } 

    public function updateAccount()  
    { 

        $rules = array( 
            'email'         => 'required', 
            'password'      => 'required' 
            ); 

        $validator = Validator::make(Input::all(), $rules); 

        if ($validator->fails()) { 
            return Redirect::to('/profile/edit/account')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else {
            $id = Auth::user()->id;
            $updated_user = User::find($id);
            $updated_user->email = Input::get('email'); 
            $updated_user->password = bcrypt(Input::get('password')); 
            $updated_user->save(); 

            Session::flash('message', 'Successfully updated profile!'); 
            return Redirect::to('/profile'); 
        } 
    }

    public function updateInfo() 
    { 

        $rules = array( 
            'alamat'        => 'required', 
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'
            ); 
        $validator = Validator::make(Input::all(), $rules); 

        if ($validator->fails()) { 
            return Redirect::to('/profile/edit/info')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        } else { 
            $id = Auth::user()->id; 
            $updated_user_info = UserInfo::find($id); 
            $updated_user_info->tanggal_lahir = Input::get('tanggal_lahir'); 
            $updated_user_info->alamat = Input::get('alamat'); 
            $updated_user_info->jenis_kelamin = Input::get('jenis_kelamin'); 

            $updated_user_info->save(); 

            Session::flash('message', 'Successfully updated profile!'); 
            return Redirect::to('/profile'); 
        } 
    }

    public function upload() {
        $rules = array( 
            'image' => ''
            );
        $validator = Validator::make(Input::all(), $rules); 
        if ($validator->fails()) {
            return Redirect::to('/profile/edit/account')
            ->withErrors($validator);
        }
        else {
            $id = Auth::user()->id; 
            $destinationPath = ('upload');
            $extension = Input::file('image')->getClientOriginalExtension();
            $fileName = $id.'.'.$extension;
            Input::file('image')->move($destinationPath, $fileName);

            /*$img = Image::make('upload/'.$id.'.'.$extension);
            $img->resize(200, 200);
            $img->save('upload/'.$id.'.'.$extension);*/

            Session::flash('message', 'Successfully updated picture!'); 
            return Redirect::to('/profile'); 
        }
    }
}
