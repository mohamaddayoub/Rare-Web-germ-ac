<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\SectionController as AdminSectionController ;

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


 Route::group(['prefix'=>'sections'],function(){

    Route::get('/', [AdminSectionController::class, 'index'])->name('sections/index');
    Route::post('/show', [AdminSectionController::class, 'show'])->name('sections/show');
    Route::post('/store', [AdminSectionController::class, 'store'])->name('sections/store');
    Route::post('/update', [AdminSectionController::class, 'update'])->name('sections/update');
    Route::post('/delete', [AdminSectionController::class, 'delete'])->name('sections/delete');
    Route::post('/doctors', [AdminSectionController::class, 'doctors'])->name('sections/doctors');

    });
    Route::get('/sections/onlineCosulution', [AdminSectionController::class, 'sections'])->name('onlineCosulution');

