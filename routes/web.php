<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyWorkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/',[ WorkController::class, 'index']);
Route::get('works',[ WorkController::class, 'index']);

Route::post('works/store',[ WorkController::class, 'store']);
Route::get('works/create',[ WorkController::class, 'create'])->middleware('myauth');
Route::get('works/show/{id}',[ WorkController::class, 'show']);
Route::post('works/update/{id}',[ WorkController::class, 'update']);
Route::delete('works/destroy/{id}',[ WorkController::class, 'destroy']);
Route::get('works/edit/{id}',[ WorkController::class, 'edit']);


Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);


Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'store']);

Route::get('logout', [LoginController::class, 'destroy']);


Route::get('my-works',[MyWorkController::class, 'index']);




// Route::get('/works',[WorkController::class,'index']);
// Route::post('/works/store',[WorkController::class,'store']);
// Route::put('/works/{id}',[WorkController::class,'update']);
// Route::delete('/works/{id}',[WorkController::class,'destroy']);

// Route::get('/works/show/{id}',[WorkController::class,'show']);
// Route::get('/works/create',[WorkController::class,'create']);
// Route::get('/works/edit/{id}',[WorkController::class,'edit']);
