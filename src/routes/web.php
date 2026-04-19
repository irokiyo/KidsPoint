<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;


Route::get('/child/index', [ChildController::class, 'index'])->name('child.index');
Route::post('/child/store', [ChildController::class, 'store'])->name('child.store');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');

Route::post('/reward/store', [RewardController::class, 'store'])->name('reward.store');