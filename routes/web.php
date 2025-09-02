<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/s', function () {
    return 'welcome';
});

// Route::get('/check-courses', function() {
//     return \App\Models\Course::all();
// });
