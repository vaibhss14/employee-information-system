<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\HomePage;
use App\Livewire\EmployeesPage;
use App\Livewire\AttendancePage;
use App\Livewire\LeavesPage;
use App\Livewire\DepartmentPage;
use App\Livewire\ApplyLeavePage;

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', HomePage::class)
        ->name('dashboard');

    Route::get('/employees', EmployeesPage::class)
        ->name('employees');

    Route::get('/attendance', AttendancePage::class)
        ->name('attendance');

    Route::get('/leaves', LeavesPage::class)
        ->name('leaves');

    Route::get('/departments', DepartmentPage::class)
        ->name('departments');

        Route::get('/leave/apply', ApplyLeavePage::class)
    
    ->name('leave.apply');
});

require __DIR__.'/auth.php';