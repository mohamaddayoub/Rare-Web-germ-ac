<?php

use App\Http\Controllers\Web\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => 'dash'], function () {

    Route::get('/homePage', [DashboardController::class, 'homePage'])->name('dash.homePage');
    Route::post('/showUpdate', [DashboardController::class, 'showUpdate'])->name('dash.showUpdate');
    Route::post('/updateinfo', [DashboardController::class, 'update'])->name('dash.updateinfo');
    Route::get('/showCosulution', [DashboardController::class, 'showCosulution'])->name('dash.showCosulution');
    Route::get('/showCourses', [DashboardController::class, 'showCourses'])->name('dash.showCourses');

});
Route::post('users/update', [DashboardController::class, 'updateUser'])->name('users/update');
