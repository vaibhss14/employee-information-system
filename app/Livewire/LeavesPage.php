<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Leave;
use Livewire\Component;

class LeavesPage extends Component
{
    public function render()
    {
        if (auth()->user()->role === 'employee') {

            $employee = Employee::where(
                'email',
                auth()->user()->email
            )->first();

            $leaves = $employee
                ? Leave::with('employee')
                    ->where('employee_id', $employee->id)
                    ->get()
                : collect();

        } else {

            $leaves = Leave::with('employee')->get();
        }

        return view('livewire.leaves-page', [
            'leaves' => $leaves,
        ])->layout('layouts.app');
    }

    public function approve($id)
    {
        Leave::find($id)?->update([
            'status' => 'approved',
        ]);
    }

    public function reject($id)
    {
        Leave::find($id)?->update([
            'status' => 'rejected',
        ]);
    }

    public function delete($id)
    {
        Leave::find($id)?->delete();
    }
}
