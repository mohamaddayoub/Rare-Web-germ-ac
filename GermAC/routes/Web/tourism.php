<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TourismController as AdminTourismController;

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

Route::group(['prefix' => 'tourisms'], function () {

    Route::get('/', [AdminTourismController::class, 'index'])->name('tourisms/index');
    Route::get('/show', [AdminTourismController::class, 'show'])->name('tourisms/show');
    Route::post('/store', [AdminTourismController::class, 'store'])->name('tourisms/store');
    Route::post('/update', [AdminTourismController::class, 'update'])->name('tourisms/update');
    Route::post('/delete', [AdminTourismController::class, 'delete'])->name('tourisms/delete');
    Route::get('/book', [AdminTourismController::class, 'book'])->name('tourisms/book');
});
