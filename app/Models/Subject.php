<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects'; // Define the table name

    protected $fillable = [
        'subject_name', // Mass assignable attribute
        'topic',        // Mass assignable attribute
        'status',       // Mass assignable attribute
        'date',         // Mass assignable attribute
    ];
}
