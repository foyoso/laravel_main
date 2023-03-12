<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\LayoutController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\DetailController;

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
Route::get('/galery',[GaleryController::class, 'index']);
Route::get('/detail',[DetailController::class, 'index']);


// -----------admin--- ----- --- ----//
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login/store', [LoginController::class, 'store']);

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        #domain
        Route::prefix('layout')->group(function () {
            Route::get('add',          [LayoutController::class, 'add']);
            Route::post('add',         [LayoutController::class, 'store']);
            Route::get('/',            [LayoutController::class, 'index'])->name('layoutList');

            Route::get('edit/{item}',  [LayoutController::class, 'show']);
            Route::post('edit/{item}', [LayoutController::class, 'edit']);
            Route::DELETE('delete',  [LayoutController::class, 'delete']);
        });
    });

});