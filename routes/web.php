<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\IndexController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register  web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// -----------client---------------//
Route::get('/',[IndexController::class, 'index']);


// -----------admin--- ----- --- ----//
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login/store', [LoginController::class, 'store']);

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

});