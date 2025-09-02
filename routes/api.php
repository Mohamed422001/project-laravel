<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Http\Controllers\Api\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| All routes inside this file will be prefixed with /api automatically.
|
*/

// ✅ Route افتراضي
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ✅ CRUD كامل للكورسات
Route::apiResource('courses', CourseController::class);

// ✅ Route لفحص جميع الكورسات
// routes/api.php
Route::get('/check-courses', [CourseController::class, 'index']);

// ✅ Health Check Route
Route::get('/health', function () {
    return response()->json(['status' => 'OK'], 200);
});
