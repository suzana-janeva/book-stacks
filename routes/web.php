<?php

use App\Http\Controllers\BookStackController;
use Illuminate\Support\Facades\Route;

Route::get('/books', [BookStackController::class, 'index'])->name('bookstacks.index');
Route::post('/book', [BookStackController::class, 'store'])->name('bookstacks.store');