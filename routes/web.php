<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\BranchController;

// Home Page (Optional)
Route::get('/', function () {
    return view('welcome'); // Replace this with your desired home view if needed
})->name('home');

// Base Routes
Route::get('/base', [BaseController::class, 'index'])->name('bases.index');
Route::get('/base/create', [BaseController::class, 'create'])->name('bases.create');
Route::post('/base', [BaseController::class, 'store'])->name('bases.store');
Route::get('/base/{base}/edit', [BaseController::class, 'edit'])->name('bases.edit');
Route::put('/base/{base}', [BaseController::class, 'update'])->name('bases.update');
Route::delete('/base/{base}', [BaseController::class, 'destroy'])->name('bases.destroy');

// Branch Routes
Route::get('/branch', [BranchController::class, 'index'])->name('branches.index');
Route::get('/branch/create', [BranchController::class, 'create'])->name('branches.create');
Route::post('/branch', [BranchController::class, 'store'])->name('branches.store');
Route::get('/branch/{branch}/edit', [BranchController::class, 'edit'])->name('branches.edit');
Route::put('/branch/{branch}', [BranchController::class, 'update'])->name('branches.update');
Route::delete('/branch/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');

