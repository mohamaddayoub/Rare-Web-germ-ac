<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Session;
use Stripe;
use Stripe\StripeClient;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        $course_id= $request->input('id');
        $course = Course::find($course_id);
        // return $course ;
        $user = auth('sanctum')->user();
        $transaction = Transaction::where('user_id' , $user->id)->where('course_id' , $course_id)->first();
        if($transaction == null ||  $transaction->payment_status !='paid'){
        $stripe = new StripeClient(config("app.STRIPE_SECRET_KEY"));
        $array = [];
        array_push($array, [
            'price_data' => [
                'currency' => $course->currency,
                // 'tax_behavior' => 'inclusive',
                'product_data' => [
                    'name' => $course->name,
                    // 'images' =>  [url("$product->main_photo")]
                    // 'images'=>  ["https://www.dosfarma.com/23738-large_default/test-embarazo-personal-test-1-ud.jpg"]
                ],
                'unit_amount' => $course->price,
            ],
            'quantity' => 1
        ]);

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $array,
            'mode' => 'payment',
            'success_url' => url(config("app.payment_success_url")) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => url(config("app.payment_cancel_url")) . "?session_id={CHECKOUT_SESSION_ID}",
        ]);

        $user = auth('sanctum')->user();
        $transaction = Transaction::create(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
                'sessionId' => $checkout_session->id,
                'customer_email' => $user->email,
                'payment_method_type' => 'N/A',
                'payment_status' => 'Pending',
            ]
        );
        DB::commit();

        return response()->json(["checkout_session_url" => $checkout_session->url]);
    }
    elseif($transaction->payment_status !='paid'){
        $stripe = new StripeClient(config("app.STRIPE_SECRET_KEY"));
        $array = [];
        array_push($array, [
            'price_data' => [
                'currency' => $course->currency,
                // 'tax_behavior' => 'inclusive',
                'product_data' => [
                    'name' => $course->name,
                    // 'images' =>  [url("$product->main_photo")]
                    // 'images'=>  ["https://www.dosfarma.com/23738-large_default/test-embarazo-personal-test-1-ud.jpg"]
                ],
                'unit_amount' => $course->price,
            ],
            'quantity' => 1
        ]);

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $array,
            'mode' => 'payment',
            'success_url' => url(config("app.payment_success_url")) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => url(config("app.payment_cancel_url")) . "?session_id={CHECKOUT_SESSION_ID}",
        ]);

        $user = Auth::user();
        $transaction->update(
            [
                'sessionId' => $checkout_session->id,
                'customer_email' => $user->email,
                //'payment_method_type' => 'N/A',
                'payment_status' => 'Pending',
            ]
        );
        DB::commit();

         return redirect($checkout_session->url);
    }
         elseif($transaction != null && $transaction->payment_status =='paid'){
            // return $course_id;
            $course =Course::where('id',$course_id)->with('videos')->first();
            return response()->json(["course" => $course,'message'=> '' , 'status'=>200]);
         }
    }



    public function success()
    {
        // method to redirect user to success url
        // update payment_method_types , payment_status in Transaction table
        // update paid in Order table

        $stripe = new StripeClient(config("app.STRIPE_SECRET_KEY"));
        $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
        // return $session;
        $transaction = Transaction::where('sessionId', $session->id)->first();
        $transaction->update([
            'payment_method_type' => $session->payment_method_types[0],
            'payment_status' => $session->payment_status,
        ]);
        $course =Course::where('id',$transaction->course_id)->with('videos')->first();
        //  return  response()->json(['message'=>'Transaction has been updated successfully','shipment'=>$shipment],200);
        // return redirect('https://arabesquegallery.ae/api/success')->with("message", 'Transaction has been updated successfully');
        // return redirect()->route('home')->with('success','The payment process has been completed successfully. You can now go to the videos page');
        return response()->json(['course'=>$course , 'message'=> 'he payment process has been completed successfully. You can now watch the videos page' , 'status'=>200]);
    }

    // method to redirect user to cancel url
    // update  payment_status in Transaction table

    public function cancel()
    {
        $stripe = new StripeClient(config("app.STRIPE_SECRET_KEY"));
          $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
        $transaction = Transaction::where('sessionId', $session->id)->first();
        $transaction->update([
            // 'payment_method_type'=>$session->payment_method_types[0],
            'payment_status' => $session->payment_status,
        ]);
        return response()->json(['message'=> 'We have canceled your payment request' , 'status'=>400]);
        // We have canceled your payment request
        // return redirect('127.0.0.1/api/success')->with("message", 'Transaction has been updated successfully');
    }
   
}

// }
