<?php

namespace App\Http\Controllers\Api;


use App\Models\Course;
use Illuminate\Http\Request;

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
        $courses=Course::all();
        return response()->json(['courses'=>$courses , 'message'=> '' , 'status'=>200]);

    }

    public function home()
    {
        //
        $courses=Course::limit(8)->get();

        return response()->json(['courses' => $courses, 'message'=> '' , 'status'=>200]);
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
        $course=Course::create([
            'name'=>request('name'),
            'descriotion'=>request('descriotion'),
            'path'=>request('path'),
            'date'=>request('date'),
            'time'=>request('time'),
            'rate'=>request('rate'),

         ]);
         $course->save();

         return response()->json(['course'=>$course , 'message'=> 'added Course Succssefully' , 'status'=>200]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id= request('course_id');
        $course =Course::with('doctors' , 'section')->where('id',$id)->first();

        if($course !=null)
        {
            return response()->json(['course'=>$course , 'message'=> '' , 'status'=>200]);

        }

        return response()->json(['message'=> 'This course_id not found' , 'status'=> 400]);


    }


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
    public function update()
    {
        //
        $id= request('course_id');
        $course = Course::find($id);

        if($course != null){

        $course->update([

            'name'=>request('name'),
            'descriotion'=>request('descriotion'),
            'path'=>request('path'),
            'date'=>request('date'),
            'time'=>request('time'),
            'rate'=>request('rate'),
         ]);

         return response()->json(['course'=>$course , 'message'=> 'The Info Updated' ,  'status'=> 200]);
        }
         else {
            return response()->json(['message'=> 'This course_id not found' , 'status'=> 400]);
            }


        }

    public function add_rate()
    {
        //
        $course_id= request('course_id');
        $course = Course::find($course_id);
        if($course != null){

        $course->update([

            'rate'=>request('rate'),

         ]);
         return response()->json(['course'=>$course , 'message'=> 'The Info Updated' ,  'status'=> 200]);
        }
         else {
            return response()->json(['message'=> 'This course_id not found' , 'status'=> 400]);
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $id= request('course_id');
        $course =Course::find($id);

        if($course != null){
            $course->delete();
            $course->save();


        return response()->json(['course'=>$course , 'message'=> 'The Info Deleted' , 'status'=> 200]);
    }

        else
        {
            return response()->json(['message'=> 'This course_id not found' , 'status'=> 400]);
            }

}}
