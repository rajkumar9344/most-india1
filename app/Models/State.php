<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'states'; // Specify the table name if not the default 'states'

    protected $fillable = ['name']; // Add columns you want to allow mass assignment
    //
}
