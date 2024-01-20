<?php

namespace App\Http\Controllers\Api;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $messages=Message::all();
        // return view('index' ,['Message' => $messages]);
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

        $message=Message::create([
            'name'=>request('name'),
            'email'=>request('email'),
            'subject'=>request('subject'),
            'message'=>request('message'),

         ]);
         $message->save();

         return response()->json(['message'=>$message , 'message'=> 'added Message Succssefully' , 'status'=>200]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id= request('message_id');
        $message = Message::find($id);
        if($message !=null)
        {
            return response()->json(['message'=>$message , 'message'=> '' , 'status'=>200]);

        }

        return response()->json(['message'=> 'This message_id not found' , 'status'=> 400]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $Message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $Message
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        $id= request('message_id');
        $message = Message::find($id);

        if($message != null){
            $message->delete();
            $message->save();


        return response()->json(['message'=>$message , 'message'=> 'The Info Deleted' , 'status'=> 200]);
    }

        else
        {
            return response()->json(['message'=> 'This message_id not found' , 'status'=> 400]);
            }



    }
}
