<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth')->group(function () {
    Route::get('/activities', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activity.show');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activity.create');
    Route::put('/activities/{activity}', [ActivityController::class, 'update'])->name('activity.update');
    Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activity.destroy');
//});
