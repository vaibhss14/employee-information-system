<?php

namespace App\Livewire;

use Livewire\Component;

class DepartmentPage extends Component
{
  public function mount()
{
    if (!auth()->check()) {
        return redirect('/login');
    }
}
}
