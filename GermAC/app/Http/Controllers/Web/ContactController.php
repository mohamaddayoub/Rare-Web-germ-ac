<?php

namespace App\Http\Controllers\Web;

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
        // $contact=Contact::first();
        // if($contact == null )
        // {
        //     $contact->create([
        //         'location' => 'Dubai World Trade Center-Sheikh Rashid Tower
        //         Floor number  4',
        //         'email' => 'Orwah79@yahoo.com',
        //         'call' => '  UAE
        //         00971559610205
        //         00971026660826
        //           Germany     004915901386561
        //            KSA.             00966530604870',
        //      ]);
        // }

        return view('ContactUs');
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
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //

        $contact = Contact::find($id);

        $contact->update([
            'location'=>$request->input('location'),
            'email'=>$request->input('email'),
            'call'=>$request->input('call'),

         ]);

         return redirect()->back()->with('success','The location has been Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $Contact , $id)
    {
        //
        $contact = Contact::find($id);

        if($contact != null){
            $contact->delete();
            $contact->save();
        }

        return redirect()->back()->with('success','The location has been Deleted  successfully');


    }
}
