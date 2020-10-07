<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add-user',[UserController::class,'addUsers']);

Route::post('/create-user',[UserController::class,'createUsers'])->name('user.create');

Route::get('/users',[UserController::class,'getUsers']);

Route::get('/single-users/{id}',[UserController::class,'getUsersById']);

Route::get('/delete-user/{id}',[UserController::class,'deleteUsers']);

Route::get('/edit-user/{id}',[UserController::class,'editUsers']);

Route::post('/update-user',[UserController::class,'updateUsers'])->name('user.update');
