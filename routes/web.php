<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

Route::get('/', [BookController::class, 'index'])->name('books.index');

Route::get('/author', [AuthorController::class, 'index']);

Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');