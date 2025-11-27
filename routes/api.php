<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LookupController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GroupCourseInstructorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/groups', [LookupController::class, 'groups']);
Route::get('/courses', [LookupController::class, 'courses']);
Route::get('/instructors', [LookupController::class, 'instructors']);
Route::get('/rooms', [LookupController::class, 'rooms']);

Route::get('/instructor-lock', [GroupCourseInstructorController::class, 'showLock']);

Route::get('/schedule', [ScheduleController::class, 'index']);
Route::post('/schedule', [ScheduleController::class, 'store']);