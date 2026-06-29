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
        if ($this->record->role === 'employee') {

            Employee::create([
                'user_id' => $this->record->id,
                'name' => $this->record->name,
                'email' => $this->record->email,
                'salary' => $this->data['salary'] ?? 0,
                'joining_date' => $this->data['joining_date'] ?? now()->toDateString(),
                'phone' => $this->data['phone'] ?? null,
                'department_id' => $this->data['department_id'],
            ]);
        }
    }
}
