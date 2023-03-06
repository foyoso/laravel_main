<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('client.guesthouse.index');
});
// theme estate 3
Route::get('/estate3', function () {
    return view('client.estate3.index');
});

Route::get('/admin/login', [LoginController::class, 'index'])->name('login');

Route::post('/admin/login/store', [LoginController::class, 'store']);

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');