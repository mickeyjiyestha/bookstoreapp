<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', [BookController::class, 'index']);

Route::get('/author', [AuthorController::class, 'index']);