<?php

namespace AppHumanResources\Attendance\Domain;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['employee_id', 'fault_id', 'check_in', 'check_out'];
}
