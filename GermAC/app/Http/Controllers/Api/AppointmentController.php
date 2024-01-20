<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function bookAppointment()
    {
        //
        $appointment_id= request('appointment_id');
        $user = auth('sanctum')->user();
        if( $user !== null ){
            $appointment=Appointment::find($appointment_id);
            if($appointment->user_id ==null){
           $appointment->update([
               'user_id' => $user->id,
           ]);
           $appointment->save();
       }
    //    return redirect()->route('chat', ['id' => $appointment->id]);
    return response()->json([ 'message'=> 'Your appointment has been booked successfully' , 'status'=>200]);


    }else{
        return response()->json([ 'message'=> ' Please register or log in first' , 'status'=>400]);

    }

}
    public function getAppointments()
    {
        // $doctor = Auth::user(); // Assuming the doctor is logged in and using Laravel's authentication
        $doctor_id= request('doctor_id');
        $doctor=Doctor::find($doctor_id);
        $appointments = $doctor->appointments;

        $freeAppointments = $appointments->where('user_id', null);
        return response()->json(['freeAppointments' => $freeAppointments, 'message'=> '' , 'status'=>200]);


        // return $freeAppointments;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
}
// $appointments = $doctor->appointments;
// foreach( $appointments as  $appointment){
//     $freeAppointments[] = $appointment->where('user_id', null)->get();

// }
