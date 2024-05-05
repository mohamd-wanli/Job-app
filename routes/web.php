<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;
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


//multi listings
    
Route::get('/',[ListingController::class,'index']);



//show create form
Route::get('/listings/create',[ListingController::class,'create'])->middleware('auth');
//store create form
Route::post('/listings',[ListingController::class,'store'])->middleware('auth');

//show edit 
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//update the gig
Route::put('/listings/{listing}/edit',[ListingController::class,'update'])->middleware('auth');
//delete the gig
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

//show manage listing
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

//show registeration
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class,'store']);

//log user out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');
//show login
Route::get('/login',[UserController::class,'createlog'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

//single listing

Route::get('/listings/{listing}',[ListingController::class,'show']);
