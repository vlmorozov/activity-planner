<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ActivityGroupController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/activities', [ActivityController::class, 'index'])->name('activity.index');
    Route::get('/activity/{activity}', [ActivityController::class, 'show'])->name('activity.show');
    Route::post('/activity', [ActivityController::class, 'store'])->name('activity.create');
    Route::put('/activity/{activity}', [ActivityController::class, 'update'])->name('activity.update');
    Route::delete('/activity/{activity}', [ActivityController::class, 'destroy'])->name('activity.destroy');


    Route::get('/activity/{activity}/groups', [ActivityGroupController::class, 'index'])
        ->name('activity_group.index');

    Route::post('/activity/{activity}/group', [ActivityGroupController::class, 'store'])->name('activity_group.create');
    Route::put('/activity/{activity}/group/{activityGroup}', [ActivityGroupController::class, 'update'])->name('activity_group.update');
    Route::delete('/activity/{activity}/group/{activityGroup}', [ActivityGroupController::class, 'destroy'])->name('activity_group.destroy');

});
