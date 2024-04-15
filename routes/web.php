<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/login',[AuthController::class,'index'])->name('login.index');
Route::post('/register',[AuthController::class,'store'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::resource('posts', PostController::class)->middleware('auth');
