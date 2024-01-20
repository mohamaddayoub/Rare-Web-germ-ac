<?php

namespace App\Http\Controllers\Web;

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
        //
        // Get all conversations the authenticated user is a part of, with their last message
        $user=auth()->user();
        $user_id = $user->id ;
         // $user_id = 1;
        $user= User::where('id' ,  $user_id )->first();
        $conversations = Conversation::whereHas('users', function($query) use($user_id) {

        $query->where('user_id', $user_id);
    })
    ->with(['participants.user'=> function($query) use ($user_id) {
        $query->where('id','!=',$user_id)->get();
    }])
    ->get();
    //  dd($conversations);
    // dd($conversations);
    return view('conversations')->with(['user ', $user , 'conversations'=>$conversations]);
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

    //    try{
        $id=$request->input('id');
        $user_id=$id;
        $user=Auth::user();
       $conversation =  $user->conversations()->whereHas('participants', function ($query) use ($user_id) {
            // $employee=auth('api-employees')->user();
        $query->where('user_id', $user_id);})->with('participants')
        ->first();

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
                    return view('chatting')->with(['conversation'=>$conversation]);
                }

                // $user=Auth::user();
                // $user_id = $user->id ;
                // $user= User::where('id' ,  $user_id )->first();
            //     $conversations = Conversation::whereHas('users', function($query) use($user_id) {

            //     $query->where('user_id', $user_id);
            // })
            // ->with(['participants.user'=> function($query) use ($user_id) {
            //     $query->where('id','!=',$user_id)->get();
            // },'messages' => function($query) {
            //     $query->orderBy('created_at', 'asc')->first();
            // }])
            // ->get();
            return view('chatting')->with(['conversation'=>$conversation]);

   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Models\Conversation  $conversation
    * @return \Illuminate\Http\Response
    */
   public function show(Request $request , $id)
   {
        // $user_id = 1;
        // $user=Auth::user();
        // $user_id = $user->id ;
        // $user= User::where('id' , $user_id)->first();
        // $conversations = Conversation::whereHas('users', function($query) use($user_id) {

        // $query->where('user_id', $user_id);
        // })
        // ->with(['participants.user'=> function($query) use ($user_id) {
        // $query->where('id','!=',$user_id)->get();
        // },'messages' => function($query) {
        // $query->orderBy('created_at', 'asc')->first();
        // }])
        // ->get();
        //  dd($conversations);
    //    $conversation_id =$id;
    //    dd($conversation_id);
    //    $messages = Message::select('conversation_id','sender_id','message','created_at')->with('sender' , 'conversation')->where('conversation_id',$conversation_id)
    //    ->orderBy('created_at', 'asc')
    //    ->get();
    //    dd($messages);
    //    return view('chat-details')->with(['user ', $user , 'conversations'=>$conversations , 'messages'=>$messages]);

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
