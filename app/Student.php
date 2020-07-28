<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'roll_no',
        'student_name',
        'department_id',
        'gender_id',
        'address',
    ];
    protected $table = 'students';
}
