<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;
use View;
use Input;
use Illuminate\Support\Facades\Redirect;

class MessagingController extends Controller
{
    /**
     * Instantiate a new JobPageController instance.
     * Specify auth middleware for access control: harus login dulu!
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the message for this user
        $logged_user_id = Auth::user()->id;
        $messages = Message::where('receiver_user_id', $logged_user_id)->get();

        // load the view and pass the jobs
        return View::make('messaging.index')
        ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store
        $new_message = new Message;
        $new_message->sender_user_id = Input::get('from_id');
        $new_message->receiver_user_id = Input::get('to_id');
        $new_message->message_content = Input::get('message');
        $new_message->save();

        // redirect
        //Session::flash('message', 'Successfully created job!');
        return Redirect::to('message/'.$new_message->receiver_user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get all the message from specific sender
        $logged_user_id = Auth::user()->id;
        $sender_user_id = $id;
        $messages_received = Message::where('receiver_user_id', $logged_user_id)
        ->where('sender_user_id', $sender_user_id)
        ->get();

        $messages_sent = Message::where('receiver_user_id', $sender_user_id)
        ->where('sender_user_id', $logged_user_id)
        ->get();

        $sender_name = User::find($sender_user_id)->name; 
        
        $account_name = User::find($logged_user_id)->name; 

        // load the view and pass the jobs
        return View::make('messaging.show')
        ->with('sender_user_id', $sender_user_id)
        ->with('messages_received', $messages_received)
        ->with('messages_sent', $messages_sent)
        ->with('sender_name', $sender_name) 
        ->with('account_name', $account_name); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
