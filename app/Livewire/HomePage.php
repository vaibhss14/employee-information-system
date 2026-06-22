<?php

namespace App\Livewire;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\Leave;

use Livewire\Component;

class HomePage extends Component
{
   public function render()
{
    return view('livewire.home-page', [
        'employeeCount' => Employee::count(),
        'departmentCount' => Department::count(),
        'presentCount' => Attendance::where('status', 'Present')->count(),
        'leaveCount' => Leave::where('status', 'Pending')->count(),
    ])->layout('layouts.app');
}
}
