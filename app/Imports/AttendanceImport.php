<?php

namespace App\Imports;

use AppHumanResources\Attendance\Domain\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;

class AttendanceImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Attendance([
            'employee_id' => $row['employee_id'],
            'check_in' => $row['check_in'],
            'check_out' => $row['check_out'],
        ]);
    }
}
