<?php

namespace App\Http\Controllers\Web;


use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Video;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('Courses', ['courses' => $courses]);
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


    public function showstorecourse()
    {
        //
        return view('addcourse');

    }
    public function store(Request $request)
    {
        //
        $course = Course::create([
            'name' => $request->input('name'),
            'descriotion' => $request->input('descriotion'),
            'path' => $request->input('path'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'rate' => $request->input('rate'),

        ]);
        $course->save();

        return redirect()->back();

    }

    public function showuploadVideo()
    {
        //
        $courses = Course::all();
        return view('uplodevideo', ['courses' => $courses]);

    }

    public function uploadVideo(Request $request)
    {
        //    $this->validate($request, [
        //       'title' => 'required|string|max:255',
        //       'video' => 'required|file|mimetypes:video/mp4',
        // ]);


        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('videos', ['disk' => 'my_files']);

        }
        $video = Video::create([
            'course_id' => $request->input('course_id'),
            'title' => $request->input('title'),
            'url' => $path,

        ]);
        $video->save();

        return redirect()->back()->with('success', 'The Video has been Created successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        $user = Auth::user();
        if ($user !== null) {
            $id = $request->input('course_id');
            $course = Course::with('doctors', 'section')->where('id', $id)->first();
            return view('CourseDetails', ['course' => $course]);
        } else{
            return redirect()->route('register');
        }
    }

    // public function videos(Request $request)
    // {
    //     //
    //     $id = $request->input('id');
    //     $videos =Course::with('videos')->where('id',$id)->get();
    //    return view('videos' ,['videos' => $videos]);
    // }

    // public function info(Request $request)
    // {
    //     //
    //     $id = $request->input('id');
    //     $course =Course::with('doctors' , 'section')->where('id',$id)->first();

    //    return view('course-details')->with(['course' => $course]);

    // }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $Course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $course = Course::find($id);

        $course->update([

            'name' => $request->input('name'),
            'descriotion' => $request->input('descriotion'),
            'path' => $request->input('path'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'rate' => $request->input('rate'),

        ]);

        return redirect()->back()->with('success', 'The Course has been Updated successfully');

    }

    public function add_rate(Request $request, $course_id)
    {
        //

        $course = Course::find($course_id);

        $course->update([

            'rate' => $request->input('rate'),

        ]);

        return redirect()->back()->with('success', 'Thank you for your rating');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $Course, $id)
    {
        //
        $course = Course::find($id);

        if ($course != null) {
            $course->delete();
            $course->save();
        }

        return redirect()->back();


    }
}
