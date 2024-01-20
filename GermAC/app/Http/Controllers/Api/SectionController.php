<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Http\Request;

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
        $sections=Section::get();
        return response()->json(['sections'=>$sections , 'message'=> '' , 'status'=>200]);

    }

    // public function home()
    // {
    //     //
    //     $courses=Course::limit(8)->get();
    //     $contact=Contact::first();
    //     return response()->json(['courses' => $courses ,'contact' => $contact, 'message'=> '' , 'status'=>200]);


    // }

    // public function sections()
    // {
    //     //
    //     $sections=Section::all();
    //     return response()->json(['sections'=>$sections , 'message'=> '' , 'status'=>200]);

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

        $section=Section::create([
            'name'=>request('name'),
            'description'=>request('description'),
         ]);
         $section->save();

         return response()->json(['section'=>$section , 'message'=> 'added Section Succssefully' , 'status'=>200]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $Section
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id= request('section_id');
        $section = Section::where('id',$id)->with('courses')->first();
        if($section !=null)
        {
            return response()->json(['section'=>$section , 'message'=> '' , 'status'=>200]);

        }

        return response()->json(['message'=> 'This section_id not found' , 'status'=> 400]);

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
    public function destroy()
    {
        //
        $id= request('section_id');
        $section =Section::find($id);

        if($section != null){
            $section->delete();
            $section->save();
            return response()->json(['section'=>$section , 'message'=> 'The Info Deleted' , 'status'=> 200]);
        }

            else
            {
                return response()->json(['message'=> 'This section_id not found' , 'status'=> 400]);
                }

    }

    public function doctors()
    {
        //
        $id= request('section_id');
        $doctors =Doctor::where('section_id' , $id)->get();
        return response()->json(['doctors'=>$doctors , 'message'=> '' , 'status'=>200]);


    }
}
