<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Onsite extends Model
{
    // Explicitly set the table name
    protected $table = 'onsite';
    
    protected $fillable = [
        'employee_id',
        'work_order_number',
        'employee_name',
        'onsite_date',
        'customer_name',
        'contact_person_name',
        'contact_number',
        'from_time',
        'to_time',
        'comments',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
