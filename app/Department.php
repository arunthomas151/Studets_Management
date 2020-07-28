<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department_id',
        'department_name',
    ];
    protected $table = 'department';
}
