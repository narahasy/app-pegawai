<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\AnnouncementController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);
Route::resource('departemens', DepartemenController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('positions', PositionController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('announcements', AnnouncementController::class);

Route::get('/', function () {
    return view('dashboard'); 
})->name('dashboard');