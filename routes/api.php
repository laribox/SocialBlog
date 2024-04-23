<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('comments',[CommentController::class,'index'])->name('comments.index');
Route::post('comments',[CommentController::class,'store'])->name('comments.store');
Route::put('comments/{comment}',[CommentController::class,'update'])->name('comments.update');
Route::delete('comments/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('comments/{comment}',[CommentController::class,'show'])->name('comments.show');








