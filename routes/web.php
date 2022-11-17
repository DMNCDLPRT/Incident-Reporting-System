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
    return view('welcome');
});



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('admin')->controller(App\Http\Controllers\AdminController::class)->group(function () {
        
        Route::get('/dashboard', 'index')->name(('adminDashboard'));
    });

    Route::prefix('portal')->controller(App\Http\Controllers\portalController::class)->group(function () {

        Route::get('/portal', 'index')->name('portal');
        Route::post('/portal/submit-report');
    });
});
