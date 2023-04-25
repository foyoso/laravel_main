<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LayoutController;
use App\Http\Controllers\Admin\WebsiteController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\ListingController;
use App\Http\Controllers\Admin\ListingTypeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\TagPostController;

// -----------admin--- ----- --- ----//
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login/store', [LoginController::class, 'store']);

Route::middleware(['auth:admin'])->group(function () {

  Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

  Route::prefix('admin')->group(function () {
    #layout
    Route::prefix('layout')->group(function () {
      Route::get('add', [LayoutController::class, 'add']);
      Route::post('add', [LayoutController::class, 'store']);
      Route::get('/', [LayoutController::class, 'index'])->name('layoutList');

      Route::get('edit/{item}', [LayoutController::class, 'show']);
      Route::post('edit/{item}', [LayoutController::class, 'edit']);
      Route::delete('delete', [LayoutController::class, 'delete']);
    });

    #website
    Route::prefix('website')->group(function () {
      Route::get('add', [WebsiteController::class, 'add']);
      Route::post('add', [WebsiteController::class, 'store']);
      Route::get('/', [WebsiteController::class, 'index'])->name('websiteList');

      Route::get('edit/{item}', [WebsiteController::class, 'show']);
      Route::post('edit/{item}', [WebsiteController::class, 'edit']);
      Route::delete('delete', [WebsiteController::class, 'delete']);

      Route::get('menu/{item}',          [WebsiteController::class, 'menu']);
      Route::post('saveMenu/{item}',         [WebsiteController::class, 'saveMenu']);

      Route::get('homeSection/{item}',          [WebsiteController::class, 'homeSection']);
      Route::post('saveHomeSection/{item}',         [WebsiteController::class, 'saveHomeSection']);
    });
    #File
    Route::prefix('image')->group(function () {
      Route::post('/list', [FileController::class, 'getlist']);
      Route::post('/save', [FileController::class, 'save']);
      Route::post('/getForAjax', [FileController::class, 'getForAjax']);
    });

    #page
    Route::prefix('page')->group(function () {
      Route::get('add/{website}', [PageController::class, 'add']);
      Route::post('add/{website}', [PageController::class, 'store']);
      Route::get('/{website}', [PageController::class, 'index'])->name('pageList');

      Route::get('edit/{website}/{item}', [PageController::class, 'show']);
      Route::post('edit/{website}/{item}', [PageController::class, 'edit']);
      Route::delete('delete', [PageController::class, 'delete']);
    });

    #post
    Route::prefix('post')->group(function () {
      Route::get('add/{website}', [PostController::class, 'add']);
      Route::post('add/{website}', [PostController::class, 'store']);
      Route::get('/{website}', [PostController::class, 'index'])->name('postList');

      Route::get('edit/{website}/{item}', [PostController::class, 'show']);
      Route::post('edit/{website}/{item}', [PostController::class, 'edit']);
      Route::delete('delete', [PostController::class, 'delete']);
    });

    #post
    Route::prefix('tag')->group(function () {

      Route::post('add', [TagPostController::class, 'store']);
      Route::get('/{website}', [TagPostController::class, 'index']);
      Route::post('edit/{item}', [TagPostController::class, 'edit']);
      Route::delete('delete', [TagPostController::class, 'delete']);
    });
     #listing type
     Route::prefix('listingType')->group(function () {

      Route::post('add', [ListingTypeController::class, 'store']);
      Route::get('/', [ListingTypeController::class, 'index']);
      Route::post('edit/{item}', [ListingTypeController::class, 'edit']);
      Route::delete('delete', [ListingTypeController::class, 'delete']);
    });

    Route::prefix('listing')->group(function () {
      Route::get('add/{website}', [ListingController::class, 'add']);
      Route::post('add/{website}', [ListingController::class, 'store']);
      Route::get('/{website}', [ListingController::class, 'index'])->name('listingList');

      Route::get('edit/{website}/{item}', [ListingController::class, 'show']);
      Route::post('edit/{website}/{item}', [ListingController::class, 'edit']);
      Route::delete('delete', [ListingController::class, 'delete']);
    });


    Route::prefix('permission')->group(function () {
      Route::get('/', [PermissionController::class, 'index']);
      Route::get('add', [PermissionController::class, 'add']);
      Route::post('add', [PermissionController::class, 'store']);

      Route::get('edit/{item}', [PermissionController::class, 'show']);
      Route::post('edit/{item}', [PermissionController::class, 'edit']);
      Route::delete('delete', [PermissionController::class, 'delete']);
    });

    Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('add', [RoleController::class, 'add']);
        Route::post('add', [RoleController::class, 'store']);

        Route::get('edit/{item}', [RoleController::class, 'show']);
        Route::post('edit/{item}', [RoleController::class, 'edit']);
        Route::delete('delete', [RoleController::class, 'delete']);
        Route::get('addRolePermission', [RoleController::class, 'addRolePermission']);
        Route::post('storeRolePermission', [RoleController::class, 'storeRolePermission']);
        Route::get('test', [RoleController::class, 'test']);
    });

    #manage user
    Route::prefix('user')->group(function () {
        Route::get('add', [UserController::class, 'add']);
        Route::post('add', [UserController::class, 'store']);
        Route::get('/', [UserController::class, 'index'])->name('userList');

        Route::get('edit/{item}', [UserController::class, 'show']);
        Route::post('edit/{item}', [UserController::class, 'edit']);
        Route::delete('delete', [UserController::class, 'delete']);
      });

  });

});


Route::prefix('location')->group(function () {
  Route::post('getDistrict', [LocationController::class, 'getDistrict']);
  Route::post('getCommune', [LocationController::class, 'getCommune']);
});