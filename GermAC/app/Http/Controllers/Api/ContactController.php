<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contact=Contact::all();
       return response()->json(['contact'=>$contact , 'message'=> '' , 'status'=> 200 ]);
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
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $Contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
         $id= request('contact_id');
        $contact = Contact::find($id);

        if($contact != null){

        $contact->update([
            'location'=>request('location'),
            'email'=>request('email'),
            'call'=>request('call'),

         ]);

         return response()->json(['contact'=>$contact , 'message'=> 'The Info Updated' ,  'status'=> 200]);
        }
        else {
        return response()->json(['message'=> 'This contact_id not found' , 'status'=> 400]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $id= request('contact_id');
        $contact = Contact::find($id);

        if($contact != null){
            $contact->delete();
            $contact->save();

        return response()->json(['contact'=>$contact , 'message'=> 'The Info Deleted' , 'status'=> 200]);
    }

        else
        {
            return response()->json(['message'=> 'This contact_id not found' , 'status'=> 400]);
            }

    }
}
