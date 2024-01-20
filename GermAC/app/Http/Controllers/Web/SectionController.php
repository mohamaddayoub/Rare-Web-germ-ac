<?php

namespace App\Http\Controllers\Web;

use App\Models\Course;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = Section::get();
        return view('Sections', ['sections' => $sections]);
    }

    public function home()
    {
        //
        $courses = Course::limit(8)->get();
        $contact = Contact::first();
        return view('Home', ['courses' => $courses, 'contact' => $contact]);
    }

    public function sections()
    {
        //
        $sections = Section::all();
        return view('OnlineConsultation', ['sections' => $sections]);
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
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->input('section_id');
        $section = Section::where('id', $id)->with('courses')->first();
        return view('SectionDetails', ['section' => $section]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $Section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->input('id');
        $section = Section::find($id);

        if ($section != null) {
            $section->delete();
            $section->save();
        }

        return redirect()->back();


    }

    public function doctors(Request $request)
    {
        $section_id = $request->input('section_id');

        $user = Auth::user();
        if ($user != null) {
            $doctors = Doctor::where('section_id', $section_id)->get();
            return view('Doctors', ['doctors' => $doctors]);
        } else {
            return redirect('/register');
        }
    }

    public function lang()
    {
        $section = Section::where('id', 12)->first();
        return view('Language', ['section' => $section]);
    }
    // public function change(Request $request)
    // {

    //     App::setLocale($request->lang);
    //     session()->put('locale', $request->lang);

    //     return redirect()->back();
    // }

    public function change(Request $request)
    {
        App::setLocale($request->input('lang'));
        session()->put('locale', $request->input('lang'));

        return response()->json(['success' => true]);
    }
}
