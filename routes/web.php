<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\FacebookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

/* 
|--------------------------------------------------------------------------
| Email verification Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// The Email Verification Handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/user/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/* 
|--------------------------------------------------------------------------
| Login with Google
|--------------------------------------------------------------------------
|
*/
Route::prefix('auth/google')->controller(GoogleController::class)->group(function () {
    Route::get('/', 'redirectToGoogle')->name('redirectToGoogle');
    Route::get('/callback', 'handleGoogleCallback')->name('handleGoogleCallback');
});

/* 
|--------------------------------------------------------------------------
| Login with Facebook
|--------------------------------------------------------------------------
|
*/
/* Route::prefix('auth/facebook')->controller(FacebookController::class)->group(function () {
    Route::get('/', 'redirectToFacebook')->name('redirectToFacebook');
    Route::get('/callback', 'handleFacebookCallback')->name('handleFacebookCallback');
}); */

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
        
    Route::middleware(['auth' => 'role:super-admin|admin'])->prefix('admin')->controller(App\Http\Controllers\AdminController::class)->group(function () {
        
        Route::get('/dashboard', 'index')->name(('adminDashboard'));
        Route::get('/admin', 'admin')->name('admin');

        //cell num action delete, update
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/view/{id}', 'view')->name('view');

        //reports action
        Route::get('/view/report/{id}', 'viewReport')->name('view.report');
        Route::get('/destroy/report/{id}', 'destroyReport')->name('destroy.report');
        Route::get('/edit/report/{id}', 'editReport')->name('edit.report');

        // users
        Route::get('/all/users', 'users')->name('users');
        Route::get('/all/users/view/user/{id}', 'viewUser')->name('view.user');
        Route::get('/all/users/delete/user/{id}', 'deleteUser')->middleware('role:super-admin')->name('delete.user');

        // Assign User Roles
        Route::prefix('assign/user/role')->group(function () {
            Route::get('/super-admin/{id}', 'assignRoleSuperAdmin')->middleware('role:super-admin')->name('assign.user.superAdmin');
            Route::get('/admin/{id}', 'assignRoleAdmin')->name('assign.user.admin');
            Route::get('user/{id}', 'assingRoleUser')->name('assign.user.user');
        });

        Route::prefix('/admin/view/report/')->group(function (){
            Route::get('/update-status/read/{id}', 'updateStatusPending')->name('status.pending');
            Route::get('/update-status/processing/{id}', 'updateStatusProcessing')->name('status.processing');
            Route::get('/update-status/rejected/{id}', 'updateStatusRejected')->name('status.rejected');
        });

    });

    Route::middleware(['auth' => 'role:user|admin|super-admin'], 'verifiedphone')->prefix('portal')->controller(App\Http\Controllers\portalController::class)->group(function () {

        Route::get('/portal', 'index')->name('portal');
        
        Route::get('/user', 'user')->name('user-Profile');
        Route::get('/reports', 'reports')->name('reports');
    });
});
