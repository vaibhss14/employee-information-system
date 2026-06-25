<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;

class EmployeesPage extends Component
{
    public $employees;

    public $search = '';

    public function mount()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $this->loadEmployees();
    }

    public function loadEmployees()
    {
        $this->employees = Employee::with('department')->get();
    }

    public function delete($id)
    {
        if (auth()->user()->role !== 'admin') {
            return;
        }

        Employee::find($id)?->delete();

        $this->loadEmployees();
    }

    public function render()
    {
        return view('livewire.employees-page')
            ->layout('layouts.app');
    }
}
