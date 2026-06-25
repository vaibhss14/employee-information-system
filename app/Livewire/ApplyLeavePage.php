<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Leave;
use Livewire\Component;

class ApplyLeavePage extends Component
{
    public $leave_type;

    public $start_date;

    public $end_date;

    public $reason;

    public function submit()
    {
        $employee = Employee::where(
            'email',
            auth()->user()->email
        )->first();

        if (! $employee) {
            session()->flash('error', 'Employee record not found.');

            return;
        }

        Leave::create([
            'employee_id' => $employee->id,
            'leave_type' => $this->leave_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'reason' => $this->reason,
            'status' => 'pending',
        ]);

        session()->flash('success', 'Leave request submitted.');

        return redirect()->route('leaves');
    }

    public function render()
    {
        return view('livewire.apply-leave-page')
            ->layout('layouts.app');
    }
}
