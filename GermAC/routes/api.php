<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

require __DIR__ . '/Api/section.php';
require __DIR__ . '/Api/course.php';
require __DIR__ . '/Api/doctor.php';
require __DIR__ . '/Api/tourism.php';
require __DIR__ . '/Api/contact.php';
require __DIR__ . '/Api/message.php';
require __DIR__ . '/Api/feedback.php';

Route::post('/conversation-store', [App\Http\Controllers\Api\ConversationController::class, 'store']);


Route::post('/bookAppointment', [App\Http\Controllers\Api\AppointmentController::class, 'bookAppointment']);

Route::get('/getAppointments', [App\Http\Controllers\Api\AppointmentController::class, 'getAppointments']);


Route::post('register', [App\Http\Controllers\Api\UserController::class, 'register']);
Route::post('login', [App\Http\Controllers\Api\UserController::class, 'login']);
Route::get('logout', [App\Http\Controllers\Api\UserController::class, 'logout']);


Route::post('/checkout', [App\Http\Controllers\Api\StripeController::class, 'checkout'])->name('checkout');
// Route::post('checkout', [App\Http\Controllers\Web\StripeController::class, 'afterpayment'])->name('checkout.credit-card');
Route::get('/success', [App\Http\Controllers\Api\StripeController::class,'success'])->name('success');
Route::get('/cancel', [App\Http\Controllers\Api\StripeController::class,'cancel'])->name('cancel');
// Route::post('/webhook', [App\Http\Controllers\Api\StripeController::class, 'webhook'])->name('checkout.webhook');
