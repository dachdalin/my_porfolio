<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('technologies', \App\Http\Controllers\TechnologyController::class)->except(['show']);

Route::post('settings', [\App\Http\Controllers\ConfigController::class, 'storeOrUpdate'])
    ->name('settings.storeOrUpdate');
Route::get('settings/get-data', [\App\Http\Controllers\ConfigController::class, 'getSettings'])
    ->name('settings.index');
Route::apiResource('projects', \App\Http\Controllers\ProjectController::class)->except(['show']);

Route::get('get-user/{id}', [
    \App\Http\Controllers\ProfileController::class,
    'getUser',
]);
Route::put('update-user', [
    \App\Http\Controllers\ProfileController::class,
    'updateUser',
])->name('update-user');

Route::apiResource('experiense', \App\Http\Controllers\ExperienseController::class)->except(['show']);
Route::apiResource('education', \App\Http\Controllers\EducationController::class)->except(['show']);
