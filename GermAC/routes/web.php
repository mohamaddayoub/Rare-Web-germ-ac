<?php

use App\Http\Controllers\Web\DoctorController;
use App\Http\Controllers\Web\SectionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/homes', function () {
//     return view('home');
// });

Route::get('/home', [SectionController::class, 'home'])->name('home1');
Route::get('/', [SectionController::class, 'home'])->name('home');
Route::get('lang/home', [SectionController::class, 'lang']);
// Route::get('lang/change', [SectionController::class, 'change'])->name('changeLang');
Route::post('lang/change', [SectionController::class, 'change'])->name('changeLang');

// Route::get('/doctor-dash', [DoctorController::class, 'dash'])->name('dash');
Auth::routes();
// Route::get('/home', function () {
//     return view('index');
// })->name('home');

Route::get('about', function () {
    return view('AboutUs');
})->name('about');

// Route::get('/profile', function () {
//     return view('aboutUs');
// })->name('profile');

// Route::get('/chatting', function () {
//     return view('chatting');
// })->name('chatting');


Route::get('/humanSide', function () {
    return view('HumanSide');
})->name('humanSide');

Route::get('/developingAndSupporting', function () {
    return view('DevelopingAndSupporting');
})->name('developingAndSupporting');


Route::get('/medicalTourism', function () {
    return view('MedicalTourism');
})->name('medicalTourism');


require __DIR__ . '/Web/section.php';
require __DIR__ . '/Web/course.php';
require __DIR__ . '/Web/doctor.php';
require __DIR__ . '/Web/tourism.php';
require __DIR__ . '/Web/contact.php';
// require __DIR__ . '/Web/message.php';
require __DIR__ . '/Web/dashboard.php';
require __DIR__ . '/Web/feedback.php';



Route::get('/chat/{id}', [App\Http\Controllers\Web\ConversationController::class, 'index'])->name('chat');

Route::get('/chat-details/{id}', [App\Http\Controllers\Web\ConversationController::class, 'show'])->name('chat-details');

Route::post('/conversation-store', [App\Http\Controllers\Web\ConversationController::class, 'store'])->name('conversation-store');

Route::post('/showstoreAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'showstoreAppointment'])->name('showstoreAppointment');

Route::post('/storeAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'store'])->name('storeAppointment');


Route::post('/showUpdateAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'showUpdate'])->name('showUpdateAppointment');

Route::post('/updateAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'update'])->name('updateAppointment');


Route::post('/showAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'show'])->name('showAppointment');

Route::post('/deleteAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'destroy'])->name('deleteAppointment');

Route::post('/bookAppointment', [App\Http\Controllers\Web\AppointmentController::class, 'bookAppointment'])->name('bookAppointment');

Route::post('/getAppointments', [App\Http\Controllers\Web\AppointmentController::class, 'getAppointments'])->name('getAppointments');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/streaming', function () {
    return view('streaming');
})->name('streaming');
//
//  Route::post('/store-token', [App\Http\Controllers\Web\NotifyController::class, 'updateDeviceToken'])->name('store.token');


Route::get('/save-token', [App\Http\Controllers\Web\NotifyController::class, 'updateDeviceToken'])->name('store.token');


//  Route::get('/homes' ,[App\Http\Controllers\Web\HomeController::class, 'index'])->name('homes');

//  Route::post('/homechate',[App\Http\Controllers\Web\HomeController::class, 'createChat'])->name('home.createChat');


//  Route::post('/home','HomeController@createChat')->name('home.createChat');

Route::get('/conversations', function () {
    return view('conversations');
})->name('conversations');



Route::post('checkout', [App\Http\Controllers\Web\StripeController::class, 'checkout'])->name('checkout');
// Route::post('checkout', [App\Http\Controllers\Web\StripeController::class, 'afterpayment'])->name('checkout.credit-card');
// Route::get('/success', [App\Http\Controllers\Web\StripeController::class,'success'])->name('success');
// Route::get('/cancel', [App\Http\Controllers\Web\StripeController::class,'cancel'])->name('cancel');
// Route::post('/webhook', [App\Http\Controllers\Web\StripeController::class, 'webhook'])->name('checkout.webhook');
Route::get('videos', [App\Http\Controllers\Web\CourseController::class, 'videos'])->name('videos');
Route::get('showuploadVideo', [App\Http\Controllers\Web\CourseController::class, 'showuploadVideo'])->name('showuploadVideo');
Route::post('uploadVideo', [App\Http\Controllers\Web\CourseController::class, 'uploadVideo'])->name('uploadVideo');
