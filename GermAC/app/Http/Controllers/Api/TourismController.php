<?php

namespace App\Http\Controllers\Api;

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
        return response()->json(['tourisms'=>$tourisms , 'message'=> '' , 'status'=>200]);
    }

    // public function book()
    // {
    //     //
    //     return view('tourism');
    // }

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
    public function store()
    {
        //

        $tourism=Tourism::create([
            'name'=>request('name'),
            'phone'=>request('phone'),
            'country'=>request('subject'),
            'destination'=>request('destination'),
            'specialities'=>request('specialities'),
            'message'=>request('message'),

         ]);
         $tourism->save();

         return response()->json(['tourism'=>$tourism , 'message'=> 'added Tourism Succssefully' , 'status'=>200]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tourism  $Tourism
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id= request('tourism_id');
        $tourism =Tourism::find($id);
        if($tourism !=null)
        {
            return response()->json(['tourism'=>$tourism , 'message'=> '' , 'status'=>200]);

        }

        return response()->json(['message'=> 'This tourism_id not found' , 'status'=> 400]);


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
    public function destroy()
    {
        //
        $id= request('tourism_id');
        $tourism =Tourism::find($id);

        if($tourism != null){
            $tourism->delete();
            $tourism->save();

            return response()->json(['tourism'=>$tourism , 'message'=> 'The Info Deleted' , 'status'=> 200]);
        }

            else
            {
                return response()->json(['message'=> 'This tourism_id not found' , 'status'=> 400]);
                }


    }
}
