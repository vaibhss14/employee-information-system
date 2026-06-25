<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'department_id',
        'salary',
        'joining_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
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
                ? ((int) substr($lastEmployee->id, 3)) + 1
                : 1;

            $employee->id = 'EMP'.str_pad($number, 3, '0', STR_PAD_LEFT);
        });
    }
}
