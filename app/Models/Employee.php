<?php

namespace App\Models;
use App\Models\Department;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
        protected $fillable = [
        'employee_code',
        'name',
        'email',
        'phone',
        'department_id',
        'salary',
        'joining_date',
        'photo',
    ];
    public function leaves()
{
    return $this->hasMany(Leave::class);
}
public function department(): BelongsTo
{
    return $this->belongsTo(Department::class);
}
protected static function booted()
{
    static::creating(function ($employee) {

        $lastEmployee = Employee::latest('id')->first();

        $number = $lastEmployee
            ? ((int) substr($lastEmployee->employee_code, 3)) + 1
            : 1;

        $employee->employee_code = 'EMP' . str_pad($number, 3, '0', STR_PAD_LEFT);
    });
}
}