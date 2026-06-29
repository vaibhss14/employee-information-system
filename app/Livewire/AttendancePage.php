<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class AttendancePage extends Component
{
    public $selectedDate;

    public $search = '';

    public $hasMarkedToday = false;

    public function mount()
    {
        $this->selectedDate = now()->toDateString();

        if (auth()->user()->role === 'employee') {

            $employee = Employee::where(
                'email',
                auth()->user()->email
            )->first();

            if ($employee) {
                $this->hasMarkedToday = Attendance::where(
                    'employee_id',
                    $employee->id
                )
                    ->whereDate('date', today())
                    ->exists();
            }
        }
    }

    public function markAttendance()
    {
        $employee = Employee::where(
            'email',
            auth()->user()->email
        )->first();

        if (! $employee) {
            return;
        }

        $alreadyMarked = Attendance::where(
            'employee_id',
            $employee->id
        )
            ->whereDate('date', Carbon::today())
            ->exists();

        if ($alreadyMarked) {

            session()->flash(
                'error',
                'You have already marked your attendance today.'
            );

            return;
        }

        $officeStartTime = Carbon::today()->setTime(9, 15); // 9:00 AM

        $status = now()->lessThanOrEqualTo($officeStartTime)
            ? 'present'
            : 'late';

        Attendance::create([
            'employee_id' => $employee->id,
            'date' => today(),
            'status' => $status,
        ]);

        $this->hasMarkedToday = true;

        session()->flash(
            'success',
            'Attendance marked successfully!'
        );
    }

    public function render()
    {
        $query = Attendance::with('employee');

        if (auth()->user()->role === 'employee') {

            $employee = Employee::where(
                'email',
                auth()->user()->email
            )->first();

            if ($employee) {
                $query->where('employee_id', $employee->id);
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        if ($this->selectedDate) {
            $query->whereDate('date', $this->selectedDate);
        }

        if ($this->search) {
            $query->whereHas('employee', function ($q) {
                $q->where('name', 'like', '%'.$this->search.'%');
            });
        }

        $attendances = $query
            ->latest('date')
            ->get();

        $todayAttendance = null;

        if (auth()->user()->role === 'employee' && isset($employee)) {
            $todayAttendance = Attendance::where('employee_id', $employee->id)
                ->whereDate('date', today())
                ->first();
        }

        return view('livewire.attendance-page', [
            'attendances' => $attendances,
            'todayAttendance' => $todayAttendance,
        ])->layout('layouts.app');
    }
}
