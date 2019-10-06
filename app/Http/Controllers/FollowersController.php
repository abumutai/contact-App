<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\User;
use App\Contact;
use Auth;

class FollowersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       

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
       $follower= new Follower;
       $follower->user_id=$request->get('profile_id');
       $follower->follower_id=$request->get('following_id');
       $follower->status='pending';
       $follower->save();

       return back()->with('success','Follow request sent!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact=Contact::find($id);

        return view('followers.index',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $followers=Follower::all()->where('user_id',$id)->where('status','following');
        $requests=Follower::all()->where('user_id',$id)->where('status','pending');
     return view('contacts.mycontacts',compact('followers','requests'));

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
        $user_id= $request->get('user_id');
        $follower_id=$request->get('follower_id');
        $follower= Follower::find($id)->where('user_id',$user_id)->where('follower_id',$follower_id);
        $follower->status='following';
        $follower->save();

        return view('contacts.mycontacts')->with('success',$user_id.'Can now view your contacts');
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
    }
}
