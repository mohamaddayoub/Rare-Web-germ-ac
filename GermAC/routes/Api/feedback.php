<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FeedbackController as AdminFeedbackController ;

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


 Route::group(['prefix'=>'feedback'],function(){

    Route::get('/', [AdminFeedbackController::class, 'index']);
    // Route::get('/show', [AdminFeedbackController::class, 'show'])->name('feedback.show');
    Route::post('/store', [AdminFeedbackController::class, 'store']);
    Route::post('/update', [AdminFeedbackController::class, 'update']);
    Route::post('/delete', [AdminFeedbackController::class, 'delete']);

    });
