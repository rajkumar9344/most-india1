<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department'; // Define the table name
    protected $fillable = ['name']; // Define the columns that can be mass assigned
}
