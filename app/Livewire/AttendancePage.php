<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\Employee;

class AttendancePage extends Component
{
    public function render()
{
    if (auth()->user()->role === 'employee') {

        $employee = Employee::where(
            'email',
            auth()->user()->email
        )->first();

        $attendances = $employee
            ? Attendance::where('employee_id', $employee->id)->get()
            : collect();

    } else {

        $attendances = Attendance::with('employee')->get();
    }

    return view('livewire.attendance-page', [
        'attendances' => $attendances,
    ])->layout('layouts.app');
}
}