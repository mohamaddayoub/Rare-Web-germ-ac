<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SectionController as AdminSectionController ;

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


 Route::group(['prefix'=>'section'],function(){

    Route::get('/', [AdminSectionController::class, 'index']);
    Route::get('/show', [AdminSectionController::class, 'show']);
    // Route::post('/store', [AdminSectionController::class, 'store']);
    // Route::post('/update', [AdminSectionController::class, 'update']);
    // Route::post('/delete', [AdminSectionController::class, 'delete']);
    Route::get('/doctors', [AdminSectionController::class, 'doctors']);

    });
    Route::get('/sections.onlineCosulution', [AdminSectionController::class, 'sections']);

