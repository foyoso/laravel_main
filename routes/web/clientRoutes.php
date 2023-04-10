<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RenderController;

// -----------client---------------//
Route::get('/',[IndexController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/listing',[ListingController::class, 'index']);
Route::get('/listing/{slug}',[ListingController::class, 'detail']);
Route::get('/blog',[BlogsController::class, 'index']);
Route::get('/blog/{slug}',[BlogsController::class, 'detail']);
Route::get('/render/province', [RenderController::class, 'index']);
Route::get('/render/district', [RenderController::class, 'district']);
Route::get('/render/commune', [RenderController::class, 'commune']);
Route::get('/render/post', [RenderController::class, 'post']);