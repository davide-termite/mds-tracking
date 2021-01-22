<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', [App\Http\Controllers\TrackerController::class, 'showUserCodes'])->name("dashboard-show");
    Route::post('/dashboard', [App\Http\Controllers\TrackerController::class, 'insertCode'])->name("dashboard-create");
    
    Route::get('/dashboard/{codice}', [App\Http\Controllers\TrackerController::class, 'showSingleCode']);   
});

Route::group(['middleware' => ['auth', 'reception']], function() {
    Route::get('/dashboard', [App\Http\Controllers\ReceptionController::class, 'index']);
});

Route::get('/cron', [App\Http\Controllers\TrackerController::class, 'cron']);

// })