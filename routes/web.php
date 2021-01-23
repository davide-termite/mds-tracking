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

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', [App\Http\Controllers\TrackerController::class, 'showUserCodes']);
    Route::post('/dashboard', [App\Http\Controllers\TrackerController::class, 'insertCode'])->name("dashboard-create");
    
    Route::get('/dashboard/{codice}', [App\Http\Controllers\TrackerController::class, 'showSingleCode']);   
});

Route::group(['middleware' => ['auth', 'reception']], function() {
    Route::get('/dashboard', function () {
        return redirect('reception');
    });

    Route::get('/reception', [App\Http\Controllers\ReceptionController::class, 'index'])->name("dashboard-reception");
    Route::get('/reception/{codice}', [App\Http\Controllers\ReceptionController::class, 'status']);
    Route::put('/reception/{codice}/{id}/sendmail', [App\Http\Controllers\ReceptionController::class, 'sendMail'])->name("send-mail");
});

Route::get('/cron', [App\Http\Controllers\TrackerController::class, 'cron']);

// })