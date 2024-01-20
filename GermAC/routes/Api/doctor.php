<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DoctorController as AdminDoctorController ;

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



 Route::group(['prefix'=>'doctor'],function(){

    Route::get('/', [AdminDoctorController::class, 'index']) ;
    Route::get('/show', [AdminDoctorController::class, 'show']) ;
    Route::post('/store', [AdminDoctorController::class, 'store']) ;
    Route::post('/update', [AdminDoctorController::class, 'update']) ;
    Route::post('/delete', [AdminDoctorController::class, 'delete']) ;

    });
