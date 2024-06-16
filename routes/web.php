<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');



Route::middleware(['auth'])->group(function () {

    /**
     * PAGES
     */
    Route::get('/select-state', [AuthController::class, 'select_state'])->name('select-state');
    Route::post('/select-state', [AuthController::class, 'select_state_action'])->name('select-state_action');

    /**
     * DASHBOARD
     */
    Route::get('/dashboard/my-account', [DashboardController::class, 'myAccount'])->name('my_account');
    Route::post('/dashboard/my-account', [DashboardController::class, 'myAccountAction'])->name('my_account_action');


    Route::get('/dashboard/delete/ad/{id}', [AdController::class, 'deleteAd'])->name('delete.ad');

    Route::get('/dashboard/my-ads', [DashboardController::class, 'myAds'])->name('my_ads');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



/**
 * AUTH / CONTROLLER ROUTES
 */
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerAction'])->name('register_action');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login_action');

Route::get('/recuperar', function () {
    return view('auth.forgot-password');
})->name('forgot.password');
//TODO: Forgot password POST


