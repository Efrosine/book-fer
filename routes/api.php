<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('writers', WriterController::class);
Route::apiResource('books', BookController::class);
Route::get('genres', GenreController::class);
