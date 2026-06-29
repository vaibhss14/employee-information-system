<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function afterSave(): void
    {
        if ($this->record->employee) {
            $this->record->employee->update([
                'name' => $this->record->name,
                'email' => $this->record->email,
                'phone' => $this->data['phone'] ?? $this->record->employee->phone,
                'salary' => $this->data['salary'] ?? $this->record->employee->salary,
                'joining_date' => $this->data['joining_date'] ?? $this->record->employee->joining_date,
                'department_id' => $this->data['department_id'] ?? $this->record->employee->department_id,
            ]);
        }
    }
}
