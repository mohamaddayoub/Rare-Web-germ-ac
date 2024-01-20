<?php

namespace App\Http\Controllers\Web;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use App\Models\Chat;
// use OptionsBuilder;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
// use FCM;
use LaravelFCM\Facades\FCM;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $id = Auth::user()->id;
    //     $chats = Chat::where('sender_id' , $id)->get();

    //     return view('home' ,['chats'=>$chats]);
    // }

    // public function createChat(Request $request)
    // {
    //     $input = $request->all();
    // $message = $input['message'];
    // $chat = new Chat([
    //     'sender_id' => auth()->user()->id,
    //     'sender_name' => auth()->user()->name,
    //     'message' => $message
    // ]);

    // $this->broadcastMessage(auth()->user()->name,$message);

    // $chat->save();
    // return redirect()->back();

    // }

    // private function broadcastMessage($senderName, $message)
    // {
    //     $optionBuilder = new OptionsBuilder();
    //     $optionBuilder->setTimeToLive(60 * 20);

    //     $notificationBuilder = new PayloadNotificationBuilder('New message from : ' . $senderName);
    //     $notificationBuilder->setBody($message)
    //         ->setSound('default')
    //         ->setClickAction('http://localhost:8000/homes');

    //     $dataBuilder = new PayloadDataBuilder();
    //     $dataBuilder->addData([
    //         'sender_name' => $senderName,
    //         'mesage' => $message
    //     ]);

    //     $option = $optionBuilder->build();
    //     $notification = $notificationBuilder->build();
    //     $data = $dataBuilder->build();

    //     $tokens = User::all()->pluck('fcm_token')->toArray();

    //     // $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

    //     // return $downstreamResponse->numberSuccess();

    // }
}
