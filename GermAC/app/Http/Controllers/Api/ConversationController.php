<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    //    try{
        $user_id=request('doctor_id');
        $user=auth('sanctum')->user();
       $conversation =  $user->conversations()->whereHas('participants', function ($query) use ($user_id) {
            // $employee=auth('api-employees')->user();
        $query->where('user_id', $user_id);})->with('participants')->first();

                if($conversation == null)
                {
                    $user1=User::where('id',$user->id)->first();
                    $conversation=Conversation::create([]);
                    $participants=Participant::create([
                        'conversation_id'=>$conversation->id,
                        'user_id'=>$user_id,
                    ]);
                    $participants=Participant::create([
                        'conversation_id'=>$conversation->id,
                        'user_id'=>$user1->id,
                    ]);
                    return response()->json(['conversation' => $conversation, 'message'=> 'Conversation Created Successfully ' , 'status'=>200]);
                }
            return response()->json(['conversation' => $conversation, 'message'=> 'Conversation Created Successfully' , 'status'=>200]);

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Conversation  $conversation
    * @return \Illuminate\Http\Response
    */
   public function show(Request $request , $id)
   {

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Conversation  $conversation
    * @return \Illuminate\Http\Response
    */
   public function edit(Conversation $conversation)
   {
       //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Conversation  $conversation
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Conversation $conversation)
   {
       //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Conversation  $conversation
    * @return \Illuminate\Http\Response
    */
   public function destroy(Conversation $conversation)
   {
       //
   }

}
