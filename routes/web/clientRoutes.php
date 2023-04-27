<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\RenderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PorfolioController;

// -----------client---------------//
Route::get('/',[IndexController::class, 'index']);

Route::get('/contact',[ContactController::class, 'index']);
Route::post('/contact/save', [ContactController::class, 'save']);

Route::get('/listings',[ListingController::class, 'index']);
Route::get('/listings/{slug}',[ListingController::class, 'detail']);
Route::get('/blogs',[BlogsController::class, 'index']);
Route::get('/blogs/{slug}',[BlogsController::class, 'detail']);
Route::get('/{slug}',[PageController::class, 'index']);
Route::get('/porfolio',[PorfolioController::class, 'index']);
Route::get('/porfolio/detail',[PorfolioController::class, 'detail']);

Route::get('/render/province', [RenderController::class, 'index']);
Route::get('/render/district', [RenderController::class, 'district']);
Route::get('/render/commune', [RenderController::class, 'commune']);
Route::get('/render/post', [RenderController::class, 'post']);