<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ListingController;

// -----------client---------------//
Route::get('/',[IndexController::class, 'index']);
Route::get('/contact',[ContactController::class, 'index']);
Route::get('/detail',[DetailController::class, 'index']);
Route::get('/listing',[ListingController::class, 'index']);
Route::get('/blog',[BlogsController::class, 'index']);
Route::get('/booking',[BookingController::class, 'index']);