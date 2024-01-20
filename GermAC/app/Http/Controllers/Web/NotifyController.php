<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{

    public function updateDeviceToken(Request $request)
    {

        $user=Auth::user();
        $user_id = $user->id;
        $u=User::find($user_id);
        $u->update([

            'fcm_token'=> $request->token
        ]);
        return response()->json(['Token successfully stored.']);
    }


    }

 // $serverKey = 'app-server-key'; // ADD SERVER KEY HERE PROVIDED BY FCM
