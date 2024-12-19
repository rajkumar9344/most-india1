<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id','employee_name', 'leave_date', 'leave_type', 'leave_reason'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
