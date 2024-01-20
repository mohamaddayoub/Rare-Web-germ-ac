<?php

namespace App\Http\Controllers\Web;

use App\Models\Tourism;
use Illuminate\Http\Request;

class TourismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tourisms=Tourism::all();
        return view('index' ,['tourisms' => $tourisms]);
    }

    public function book()
    {
        //
        return view('AddTourism');
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

        $tourism=Tourism::create([
            'name'=>$request->input('name'),
            'phone'=>$request->input('phone'),
            'country'=>$request->input('country'),
            'destination'=>$request->input('destination'),
            'specialities'=>$request->input('specialities'),
            'message'=>$request->input('message'),
         ]);
         $tourism->save();

         return redirect()->back()->with('success','Your request has been successfully registered. We will contact you after reviewing the request');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourism  $Tourism
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tourism =Tourism::find($id);
       return view('MedicalTourism' ,['tourism' => $tourism]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tourism  $Tourism
     * @return \Illuminate\Http\Response
     */
    public function edit(Tourism $Tourism)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tourism  $Tourism
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tourism  $Tourism
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourism $tourism , $id)
    {
        //
        $tourism =Tourism::find($id);

        if($tourism != null){
            $tourism->delete();
            $tourism->save();
        }

        return redirect()->back();


    }
}
