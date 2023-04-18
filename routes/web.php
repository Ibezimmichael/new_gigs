<?php

use App\Models\Gig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GigController;
use App\Http\Controllers\UserController;

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



// all gigs

Route::get('/', [GigController::class, 'index']);



// create form

Route::get('/gigs/create', [GigController::class, 'create'])->middleware('auth');


// store form data

Route::post('/gigs', [GigController::class, 'store'])->middleware('auth');



//edit gig
Route::get('/gigs/{gig}/edit', [GigController::class, 'edit'])->middleware('auth');


//update gig
Route::put('/gigs/{gig}', [GigController::class, 'update'])->middleware('auth');


//delete gig
Route::delete('/gigs/{gig}', [GigController::class, 'destroy'])->middleware('auth');

//manage listings

Route::get('/gigs/manage', [GigController::class, 'manage'])->middleware('auth');



// single gig

Route::get('/gigs/{gig}', [GigController::class, 'show'])->middleware('guest');



// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

