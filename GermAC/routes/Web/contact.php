<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ContactController as AdminContactController ;

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


 Route::group(['prefix'=>'contact'],function(){

    Route::get('/', [AdminContactController::class, 'index'])->name('contact.index');
    // Route::get('/show', [AdminContactController::class, 'show'])->name('contact.show');
    Route::post('/store', [AdminContactController::class, 'store'])->name('contact.store');
    Route::post('/update', [AdminContactController::class, 'update'])->name('contact.update');
    Route::post('/delete', [AdminContactController::class, 'delete'])->name('contact.delete');

    });
