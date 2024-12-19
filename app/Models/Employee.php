<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{


    //
    protected $guarded = []; 
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'date_of_birth', 'address_residential',
        'pin_code', 'city', 'country', 'state', 'address_permanent', 'emergency_contact_address',
        'emergency_contact_name', 'emergency_contact_number', 'blood_group', 'mobile_1', 'mobile_2',
        'email_personal', 'employee_id', 'department', 'designation', 'date_of_joining', 'date_of_exit',
        'status', 'email_official', 'account_holder_name', 'account_number', 'bank_name', 'branch',
        'ifsc_code', 'insurance_no', 'insurance_to_date', 'insurance_from_date', 'insurance_company_name',
        'insurance_coverage', 'photo'
    ];
    
}
