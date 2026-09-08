<?php

use Illuminate\Support\Facades\Route;

// 1. Landing Page
Route::get('/', function () {
    return view('welcome');
});

// 2. Login Page
Route::get('/login', function () {
    return view('login');
});

// 3. Parent Dashboard (የወላጅ ገጽ)
Route::get('/dashboard/parent', function () {
    return view('dashboards.parent');
});

// 4. Teacher Dashboard (የመምህራን ገጽ)
Route::get('/dashboard/teacher', function () {
    return view('dashboards.teacher');
});

// 5. School Admin Dashboard (የአድሚን ገጽ)
Route::get('/dashboard/admin', function () {
    return view('dashboards.admin');
});
