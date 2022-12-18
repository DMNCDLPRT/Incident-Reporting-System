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

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    Route::middleware(['auth' => 'role:super-admin|admin'])->prefix('admin')->controller(App\Http\Controllers\AdminController::class)->group(function () {
        
        Route::get('/dashboard', 'index')->name(('adminDashboard'));
        Route::get('/admin', 'admin')->name('admin');

        //cell num action delete, update
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('/edit/{id}', 'edit')->name('edit');

        //reports action
        Route::get('/view/report/{id}', 'viewReport')->name('view.report');
        Route::get('/destroy/report/{id}', 'destroyReport')->name('destroy.report');
        Route::get('/edit/report/{id}', 'editReport')->name('edit.report');

    });

    Route::middleware(['auth' => 'role:user|admin|super-admin'])->prefix('portal')->controller(App\Http\Controllers\portalController::class)->group(function () {

        Route::get('/portal', 'index')->name('portal');
        Route::post('/portal', 'sendSMS')->name('portal');
        
        Route::get('/user', 'user')->name('user-Profile');
        Route::get('/reports', 'reports')->name('reports');
    });
});
