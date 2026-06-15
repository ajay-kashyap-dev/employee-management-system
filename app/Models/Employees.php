<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Employees extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employees';

    protected $fillable = [
        'empid',
        'emp_name',
        'emp_designation',
        'emp_date_of_join',
        'emp_gender',
        'emp_address',
    ];

    protected $dates = ['deleted_at'];
}
