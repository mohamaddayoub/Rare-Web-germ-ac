<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TourismController as AdminTourismController ;

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

 Route::group(['prefix'=>'tourism'],function(){

    // Route::get('/', [AdminTourismController::class, 'index']);
    // Route::get('/show', [AdminTourismController::class, 'show']);
    Route::post('/store', [AdminTourismController::class, 'store']);
    // Route::post('/update', [AdminTourismController::class, 'update']);
    // Route::post('/delete', [AdminTourismController::class, 'delete']);

    });
    // Route::get('/book', [AdminTourismController::class, 'book']);
