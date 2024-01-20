<?php

namespace App\Http\Controllers\Web;

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
    public function store(Request $request)
    {
        $email = Auth::user()->email;
        $doctor = Doctor::where('email', $email)->first();
        $appointment = Appointment::create([
            'doctor_id' => $doctor->id,
            'appointment_time' => $request->input('appointment_time'),
        ]);
        $appointment->save();
        return redirect()->route('dash.homePage')->with('success', 'The appointment has been Stored successfully');
    }
    public function bookAppointment(Request $request)
    {
        //
        $id = $request->input('id');
        $user = Auth::user();
        if ($user !== null) {
            $appointment = Appointment::find($id);
            if ($appointment->user_id == null) {
                $appointment->update([
                    'user_id' => $user->id,
                ]);
                $appointment->save();
            }
            $doctor = Doctor::find($appointment->doctor_id);
            $appointments = $doctor->appointments;

            $freeAppointments = $appointments->where('user_id', null);
            return view('Appointments', ['freeAppointments' => $freeAppointments]);

            //    return redirect()->route('chat', ['id' => $appointment->id]);
            // return redirect()->back()->with('success', 'The appointment has been booked successfully');
        } else {
            return redirect()->route('register')->with('error', 'Please register or log in first');
        }

    }

    public function getAppointments(Request $request)
    {
        // $doctor = Auth::user(); // Assuming the doctor is logged in and using Laravel's authentication
        $id = $request->input('doctor_id');
        $doctor_id = $id;
        $doctor = Doctor::find($doctor_id);
        $appointments = $doctor->appointments;

        $freeAppointments = $appointments->where('user_id', null);
        return view('Appointments', ['freeAppointments' => $freeAppointments]);

        // return $freeAppointments;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment, Request $request)
    {
        //
        $id = $request->input('id');
        $appointment = Appointment::where('id', $id)->with('user')->first();
        return view('showAppointment', ['appointment' => $appointment]);
    }

    public function showstoreAppointment()
    {
        //
        $doctor_id = Auth::user()->id;
        $doctor = Doctor::find($doctor_id);
        return view('storeAppointment', ['doctor' => $doctor]);
    }


    public function showUpdate(Request $request)
    {
        //
        $id = $request->input('id');
        $appointment = Appointment::find($id);
        return view('dash_updateAppointment', ['appointment' => $appointment]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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
    public function update(Request $request)
    {
        //
        $id = $request->input('id');
        $appointment = Appointment::find($id);

        $appointment->update([
            'appointment_time' => $request->input('appointment_time'),
        ]);
        $appointment->save();
        return redirect()->route('dash.homePage')->with('success', 'The appointment has been Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment, Request $request)
    {
        //
        $id = $request->input('id');
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('dash.homePage')->with('success', 'The appointment has been Deleted successfully');

    }
}
// $appointments = $doctor->appointments;
// foreach( $appointments as  $appointment){
//     $freeAppointments[] = $appointment->where('user_id', null)->get();

// }
