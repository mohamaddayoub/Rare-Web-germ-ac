<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CourseController as AdminCourseController ;

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

 Route::group(['prefix'=>'courses'],function(){

    Route::get('/', [AdminCourseController::class, 'index'])->name('courses/index');;
    Route::post('/show', [AdminCourseController::class, 'show'])->name('courses/show');
    Route::post('/store', [AdminCourseController::class, 'store'])->name('courses/store');
    Route::post('/showstore', [AdminCourseController::class, 'showstorecourse'])->name('courses/showstore');
    Route::post('/update', [AdminCourseController::class, 'update'])->name('courses/update');
    Route::post('/delete', [AdminCourseController::class, 'delete'])->name('courses/delete');
    Route::get('/doctors', [AdminCourseController::class, 'doctors'])->name('courses/doctors');
    });
