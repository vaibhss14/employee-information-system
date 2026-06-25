<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'status',
    ];

    // app/Models/Attendance.php

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
