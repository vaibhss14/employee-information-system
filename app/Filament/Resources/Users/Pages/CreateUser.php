<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use App\Models\Employee;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function afterCreate(): void
    {
        if (in_array($this->record->role, ['employee', 'hr'])) {

            Employee::create([
                'name' => $this->record->name,
                'email' => $this->record->email,
                'salary' => 0,
                'joining_date' => now()->toDateString(),
                'phone' => null,
                'department_id' => null,
            ]);
        }
    }
}
