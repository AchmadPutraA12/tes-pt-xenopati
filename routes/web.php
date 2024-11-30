<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EmployeePerhitunganSalaryController;
use App\Http\Controllers\Admin\EmployeePresenceController;
use App\Http\Controllers\Admin\EmployeeSalaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('create');
    Route::post('/', [EmployeeController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [EmployeeController::class, 'edit'])->name('edit');
    Route::put('/{id}', [EmployeeController::class, 'update'])->name('update');
    Route::delete('/{id}', [EmployeeController::class, 'destroy'])->name('destroy');
});

Route::get('/employee-presence', [EmployeePresenceController::class, 'index'])->name('employee-presence.index');
Route::get('/employee-salary', [EmployeeSalaryController::class, 'index'])->name('employee-salary.index');
Route::get('/perhitungan-gaji', [EmployeePerhitunganSalaryController::class, 'index'])->name('perhitungan-gaji.index');
