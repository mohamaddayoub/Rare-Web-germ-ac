<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    //
    public function homePage()
    {
        if (Auth::user() != null) {
            if (Auth::user()->role_id == 2) {
                $id = auth()->user()->id;
                $user = User::where('id', $id)->first();
                return view('ProfileUser', ['user' => $user]);

            } elseif (Auth::user()->role_id == 3) {
                $email = Auth::user()->email;
                $doctor = Doctor::where('email', $email)->with('courses', 'appointments')->first();
                return view('ProfileDoctor', ['doctor' => $doctor]);
            }
        }else{
            return redirect('/register');
        }
    }

    public function showUpdate(Request $request)
    {

        $id = $request->input('id');
        $doctor = Doctor::find($id);
        return view('dash_updateProfile', ['doctor' => $doctor]);

    }


    public function panel()
    {
        if (Auth::user() != null) {
            //  Route::redirect('/admin.voyager', '/admin')->name('voyager');
            if (Auth::user()->role_id == 1) {
                return redirect('/admin/login');
            }
            return redirect()->back();
        }
        return redirect()->back();

    }

    public function update(Request $request)
    {

        $id = $request->input('id');
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = "";
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('images', ['disk' => 'my_files']);
        }

        $doctor = Doctor::find($id);
        $doctor->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'description' => $request->input('description'),
            'image' => $imageName,
            'specialization' => $request->input('specialization'),

        ]);

        //  $doctor->save();
        $doctor = Doctor::where('email', $doctor->email)->with('courses', 'appointments')->first();
        return view('ProfileDoctor', ['doctor' => $doctor])->with('success', 'Your Informations has been Updated successfully');
    }

    public function updateUser(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);


        $id = auth()->user()->id;
        $user = User::find($id);
        if ($request->input('oldpassword') != null || $request->input('newpassword') != null) {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
            if (hash::check($request->input('oldpassword'), $user->password)) {
                $user->password = Hash::make($request->input('newpassword'));
                $user->save();
                return redirect()->back()->with('success', 'Your Password has been Updated successfully');
            } else {
                return redirect()->back()->with('error', 'The old password does not match');
            }
        }

        if ($request->input('oldpassword') == null && $request->input('newpassword') == null) {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
            return redirect()->back();
        }
    }

    public function showCourses(Request $request)
    {
        //
        $id = auth()->user()->id;
        $doctor = Doctor::where('id', $id)->with('courses')->get();
        return view('dash_showCourse', ['doctor' => $doctor]);

    }

    public function showCosulution(Request $request)
    {
        //
        $id = auth()->user()->id;
        $doctor = Doctor::where('id', $id)->with('cosulutions')->get();
        return view('dash_showCosulution', ['doctor' => $doctor]);

    }

}
