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
        $jobs = Job::where('freelancer_info_id', $freelancer_info->user_info_id)->get();

        return View::make('profile')
        ->with('jobs', $jobs)
        ->with('user_info', $user_info)
        ->with('users', $users);
    }
    public function editAccount() 
    { 
        $logged_user_id = Auth::user()->id; 
        $user_info = UserInfo::find($logged_user_id); 
        $user = user::find($user_info->user_id); 

        return View::make('account') 
        ->with('user_info', $user_info) 
        ->with('user', $user); 
    } 

    public function editInfo() 
    { 
        $logged_user_id = Auth::user()->id; 
        $user_info = UserInfo::find($logged_user_id); 
        $user = user::find($user_info->user_id); 

        return View::make('info') 
        ->with('user_info', $user_info) 
        ->with('user', $user); 
    } 

    public function updateAccount()  
    { 

        $rules = array( 
            'image'         => 'required|mimes:png', 
            'email'         => 'required', 
            'password'      => 'required', 
            ); 

        $validator = Validator::make(Input::all(), $rules); 

        if ($validator->fails()) { 
            return Redirect::to('/profile/edit/account'); 
        } else { 
            $id = Auth::user()->id; 

            $updated_user = User::find($id); 
            $updated_user->email = Input::get('email'); 
            $updated_user->password = Input::get('password'); 

            $updated_user->save(); 

            Session::flash('message', 'Successfully updated job!'); 
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
            return Redirect::to('/profile/edit/info'); 
        } else { 
            $id = Auth::user()->id; 

            $updated_user_info = UserInfo::find($id); 
            $updated_user_info->tanggal_lahir = Input::get('tanggal_lahir'); 
            $updated_user_info->alamat = Input::get('alamat'); 
            $updated_user_info->jenis_kelamin = Input::get('jenis_kelamin'); 

            $updated_user_info->save(); 

            Session::flash('message', 'Successfully updated job!'); 
            return Redirect::to('/profile'); 
        } 
    } 
    //Store photo 
    /*public function store(ProductRequest $request) 
    { 
 
        $product = new Product(array( 
            'name' => $request->get('name'), 
            'sku'  => $request->get('sku') 
            )); 
 
        $product->save(); 
 
        $imageName = $product->id . '.' .  
        $request->file('image')->getClientOriginalExtension(); 
 
        $request->file('image')->move( 
            base_path() . '/public/images/catalog/', $imageName 
            ); 
 
        return \Redirect::route('admin.products.edit',  
            array($product->id))->with('message', 'Product added!');     
        }*/ 
    }
