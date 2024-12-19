<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\EmployeeController;
// use App\Http\Controllers\AttendenceController;
// use App\Http\Controllers\AttendanceController;
// // API Routes (for JSON responses)
// // Route::post('login', [AuthController::class, 'login']); // Handle login API request

// Route::middleware('auth:sanctum')->group(function () {

    
    
// });

// // // Employee routes
// // Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
// // Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// // Employee additional routes
// Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
  
//     Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');

// Route::get('/employees/getStates', [EmployeeController::class, 'getStates'])->name('employees.states');
// Route::get('/employees/getBloodGroup', [EmployeeController::class, 'getBloodGroup'])->name('employees.BloodGroup');
// Route::get('/employees/getDepartments', [EmployeeController::class, 'getDepartments'])->name('employees.Departments');
// Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
// Route::post('/check-employee-id', [EmployeeController::class, 'checkEmployeeIdExistence'])->name('employees.checkEmployeeIdExistence');
// Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

// // Export routes
// Route::get('/employees/export/excel', [EmployeeController::class, 'exportExcel'])->name('employees.export.excel');
// Route::get('/employees/export/csv', [EmployeeController::class, 'exportCSV'])->name('employees.export.csv');
// Route::get('/employees/export/pdf', [EmployeeController::class, 'exportPDF'])->name('employees.export.pdf');

// // Attendance routes
// Route::get('/attendence', [AttendenceController::class, 'index'])->name('attendence.index');
// Route::get('/attendence/getEmployeesByDepartment', [AttendenceController::class, 'getEmployeesByDepartment'])->name('attendence.getEmployeesByDepartment');

// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');