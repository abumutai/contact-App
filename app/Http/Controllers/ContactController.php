<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Auth;

class ContactController extends Controller
{
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
        $contacts= Contact::all();
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'user_id'=>'integer|required',
            'type'=>'required',
            'description'=>'required',
            'city'=>'required',
            'country'=>'required',
            'title'=>'required'

        ]);


        $contact = new Contact;
        $contact->type =  $request->get('type');
        $contact->user_id =  $request->get('user_id');
        $contact->name =  $request->get('name');
        $contact->description = $request->get('description');
        $contact->email = $request->get('email');
        $contact->title = $request->get('title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $contact->save();

    
        return redirect('/contacts')->with('success','Contact saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact= Contact::find($id);
        if(Auth::user()->get('id')!=$id){
            return view('contacts.view',compact('contact'));
        }
        else{
            return view('contacts.profile',compact('contact'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact')); 
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'user_id'=>'integer|required',
            'type'=>'required',
            'description'=>'required',
            'city'=>'required',
            'country'=>'required',
            'title'=>'required'

        ]);


        $contact = Contact::find($id);
        $contact->type =  $request->get('type');
        $contact->user_id =  $request->get('user_id');
        $contact->name =  $request->get('name');
        $contact->description = $request->get('description');
        $contact->email = $request->get('email');
        $contact->title = $request->get('title');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contact deleted!');
    }
    
}
