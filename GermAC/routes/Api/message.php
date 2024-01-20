<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MessageController as AdminMessageController ;

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



 Route::group(['prefix'=>'message'],function(){

    Route::get('/', [AdminMessageController::class, 'index']);
    Route::get('/show', [AdminMessageController::class, 'show']);
    Route::post('/store', [AdminMessageController::class, 'store']) ;
    Route::post('/update', [AdminMessageController::class, 'update']) ;
    Route::post('/delete', [AdminMessageController::class, 'delete']) ;

    });
