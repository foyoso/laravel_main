<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\LayoutController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HousesConroller;
use App\Http\Controllers\ListingController;

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
Route::get('/listing',[ListingController::class, 'index']);
Route::get('/houses',[HousesConroller::class, 'index']);
Route::get('/booking',[BookingController::class, 'index']);


// -----------admin--- ----- --- ----//
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login/store', [LoginController::class, 'store']);

Route::middleware(['auth:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

    Route::prefix('admin')->group(function () {
        #layout
        Route::prefix('layout')->group(function () {
            Route::get('add',          [LayoutController::class, 'add']);
            Route::post('add',         [LayoutController::class, 'store']);
            Route::get('/',            [LayoutController::class, 'index'])->name('layoutList');

            Route::get('edit/{item}',  [LayoutController::class, 'show']);
            Route::post('edit/{item}', [LayoutController::class, 'edit']);
            Route::DELETE('delete',  [LayoutController::class, 'delete']);
        });

         #website
         Route::prefix('website')->group(function () {
            Route::get('add',          [WebsiteController::class, 'add']);
            Route::post('add',         [WebsiteController::class, 'store']);
            Route::get('/',            [WebsiteController::class, 'index'])->name('websiteList');

            Route::get('edit/{item}',  [WebsiteController::class, 'show']);
            Route::post('edit/{item}', [WebsiteController::class, 'edit']);
            Route::DELETE('delete',  [WebsiteController::class, 'delete']);
        });
        #File
        Route::prefix('image')->group(function () {

            Route::post('/list',            [FileController::class, 'getlist']);
            Route::post('/save',            [FileController::class, 'save']);
            Route::post('/getForAjax',            [FileController::class, 'getForAjax']);
        });

         #page
         Route::prefix('page')->group(function () {
        Route::get('add/{website}',          [PageController::class, 'add']);
        Route::post('add/{website}',         [PageController::class, 'store']);
        Route::get('/{website}',            [PageController::class, 'index'])->name('pageList');

        Route::get('edit/{website}/{item}',  [PageController::class, 'show']);
        Route::post('edit/{website}/{item}', [PageController::class, 'edit']);
        Route::DELETE('delete',    [PageController::class, 'delete']);
        });

        #post
        Route::prefix('post')->group(function () {
        Route::get('add/{website}',          [PostController::class, 'add']);
        Route::post('add/{website}',         [PostController::class, 'store']);
        Route::get('/{website}',            [PostController::class, 'index'])->name('postList');

        Route::get('edit/{website}/{item}',  [PostController::class, 'show']);
        Route::post('edit/{website}/{item}', [PostController::class, 'edit']);
        Route::DELETE('delete',    [PostController::class, 'delete']);
        });
    });


});