<?php

namespace App\Http\Controllers\Api;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors=Doctor::all();
        return response()->json(['doctors'=>$doctors , 'message'=> '' , 'status'=>200]);
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
    public function store()
    {
        //

        $doctor=Doctor::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'description'=>request('description'),
            'path'=>request('path'),
            'specialization'=>request('specialization'),
            'rate'=>request('rate'),

         ]);
         $doctor->save();

         return response()->json(['doctor'=>$doctor , 'message'=> 'added Doctor Succssefully' , 'status'=>200]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id= request('doctor_id');
        $doctor =Doctor::where('id',$id)->first();
        if($doctor !=null)
        {
            return response()->json(['doctor'=>$doctor , 'message'=> '' , 'status'=>200]);

        }

        return response()->json(['message'=> 'This doctor_id not found' , 'status'=> 400]);


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $Doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $id= request('doctor_id');
        $doctor =Doctor::find($id);

        if($doctor != null){
            $doctor->delete();
            $doctor->save();


        return response()->json(['doctor'=>$doctor , 'message'=> 'The Info Deleted' , 'status'=> 200]);
    }

        else
        {
            return response()->json(['message'=> 'This doctor_id not found' , 'status'=> 400]);
            }


    }
}
