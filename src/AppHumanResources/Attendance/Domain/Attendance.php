<?php

namespace AppHumanResources\Attendance\Domain;

use App\Employee;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = ['employee_id', 'fault_id', 'check_in', 'check_out'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
