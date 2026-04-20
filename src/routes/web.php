<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/child/index', [ChildController::class, 'index'])->name('child.index');
    Route::get('/child/show/{child}', [ChildController::class, 'show'])->name('child.show');
    Route::get('/child/store', [ChildController::class, 'create'])->name('child.create');
    Route::post('/child/store', [ChildController::class, 'store'])->name('child.store');
    Route::patch('/child/update/{child}', [ChildController::class, 'update'])->name('child.update');
    Route::delete('/child/delete/{child}', [ChildController::class, 'delete'])->name('child.delete');


    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/task/index', [TaskController::class, 'index'])->name('task.index');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');

    Route::post('/reward/store', [RewardController::class, 'store'])->name('reward.store');
});