<?php

namespace AppHumanResources\Attendance\Domain;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['employee_id', 'fault_id', 'check_in', 'check_out'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'id', 'employee_id');
    }
}
