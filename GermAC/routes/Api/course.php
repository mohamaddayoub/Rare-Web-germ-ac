<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CourseController as AdminCourseController ;

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

 Route::group(['prefix'=>'course'],function(){

    Route::get('/', [AdminCourseController::class, 'index']) ;
    Route::get('/show', [AdminCourseController::class, 'show']) ;
    Route::get('/home', [AdminCourseController::class, 'home']) ;
    // Route::post('/store', [AdminCourseController::class, 'store']);
    // Route::post('/update', [AdminCourseController::class, 'update']);
    // Route::post('/delete', [AdminCourseController::class, 'delete']);

    });
