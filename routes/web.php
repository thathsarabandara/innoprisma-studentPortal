<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Admin\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Student Registration Routes
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [StudentController::class, 'store'])->name('student.register');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/success', function () {
    return view('success');
});


// Admin
Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
