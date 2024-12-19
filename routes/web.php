<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CheckEmpController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OnsiteController;
use App\Http\Controllers\HolidayController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'registerPage'])->name('register'); // Display register page
Route::post('register', [AuthController::class, 'register'])->name('register.submit'); // Handle register form submission
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');




// Protect routes with 'auth' middleware
Route::middleware(['auth'])->group(function () {
    // Displays home.blade.php
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');


    // Employee additional routes
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

    Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

    Route::get('/employees/getStates', [EmployeeController::class, 'getStates'])->name('employees.states');
    Route::get('/employees/getBloodGroup', [EmployeeController::class, 'getBloodGroup'])->name('employees.BloodGroup');
    Route::get('/employees/getDepartments', [EmployeeController::class, 'getDepartments'])->name('employees.Departments');
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::post('/check-employee-id', [EmployeeController::class, 'checkEmployeeIdExistence'])->name('employees.checkEmployeeIdExistence');
    Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

    // Export routes
    Route::get('/employees/export/excel', [EmployeeController::class, 'exportExcel'])->name('employees.export.excel');
    Route::get('/employees/export/csv', [EmployeeController::class, 'exportCSV'])->name('employees.export.csv');
    Route::get('/employees/export/pdf', [EmployeeController::class, 'exportPDF'])->name('employees.export.pdf');

    // Attendance routes
    Route::get('/attendence', [AttendenceController::class, 'index'])->name('attendence.index');
    Route::get('/attendence/getEmployeesByDepartment', [AttendenceController::class, 'getEmployeesByDepartment'])->name('attendence.getEmployeesByDepartment');
    // Route::post('/attendence/store', [AttendenceController::class, 'store'])->name('attendence.store');  
    Route::post('/attendence/store', [AttendenceController::class, 'store'])->name('attendence.store');

    // Route::post('/leave', [LeaveController::class, 'store'])->name('leave.store');

    //holiday routes
    Route::get('/holiday', [HolidayController::class, 'index'])->name('holiday.index');
    Route::post('/holiday/create', [HolidayController::class, 'store'])->name('holiday.store');
    Route::get('/holiday/create', [HolidayController::class, 'create'])->name('holiday.create');

    Route::prefix('leave')->group(function () {
        Route::post('/store', [LeaveController::class, 'store'])->name('leave.store');
        Route::get('/', [LeaveController::class, 'index'])->name('leave.index');
    });
    // onsite routes
    Route::prefix('onsite')->group(function () {
        Route::post('/store', [OnsiteController::class, 'store'])->name('onsite.store');
        Route::get('/',[OnsiteController::class,'index'])->name('onsite.index');
        Route::get('/create/{id}',[OnsiteController::class,'create'])->name('onsite.create');
        Route::get('/show/{id}', [OnsiteController::class, 'show'])->name('onsite.show');
        Route::put('/update/{id}', [OnsiteController::class, 'update'])->name('onsite.update');
        
    });
    
});


