<?php

use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/material', [MaterialController::class,'index'])->name('index');
Route::get('/material/create', [MaterialController::class,'create'])->name('create');
Route::post('/material', [MaterialController::class,'store'])->name('store');
Route::get('/material/{material}/edit', [MaterialController::class,'edit'])->name('edit');
Route::get('/material/{material}', [MaterialController::class,'show'])->name('show');
