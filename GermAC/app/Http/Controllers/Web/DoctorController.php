<?php

namespace App\Http\Controllers\Web;

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
        $doctors = Doctor::all();
        return view('DoctorDetails', ['doctors' => $doctors]);
    }

    // public function dash()
    // {
    //     //
    // $doctor=Doctor::where('id' , 1)->with('courses')->first();

    // return view('doctor_dash' ,['doctor' => $doctor]);
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
    public function store(Request $request)
    {
        //

        $doctor = Doctor::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'path' => $request->input('path'),
            'specialization' => $request->input('specialization'),
            'rate' => $request->input('rate'),

        ]);
        $doctor->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $Doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->input('doctor_id');
        $doctor = Doctor::where('id', $id)->first();
        return view('DoctorDetails', ['doctor' => $doctor, 'course_id' => $request->input('course_id')]);
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
    public function destroy(Doctor $Doctor, $id)
    {
        //
        $doctor = Doctor::find($id);

        if ($doctor != null) {
            $doctor->delete();
            $doctor->save();
        }

        return redirect()->back();


    }
}
