<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DataController::class, 'index'])->name('index');
Route::get('form-tambah', [DataController::class, 'create'])->name('tambah');
Route::post('store', [DataController::class, 'store'])->name('store');
