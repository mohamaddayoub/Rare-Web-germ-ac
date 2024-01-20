<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\DoctorController as AdminDoctorController ;

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



 Route::group(['prefix'=>'doctors'],function(){

    Route::get('/', [AdminDoctorController::class, 'index'])->name('doctors/index');
    Route::post('/show', [AdminDoctorController::class, 'show'])->name('doctors/show');;
    Route::post('/store', [AdminDoctorController::class, 'store'])->name('doctors/store');
    Route::post('/update', [AdminDoctorController::class, 'update'])->name('doctors/update');
    Route::post('/delete', [AdminDoctorController::class, 'delete'])->name('doctors/delete');

    });
