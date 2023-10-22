<?php

use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;
use AppHumanResources\Attendance\Domain\Attendance;

class AttendanceService
{
    public function import_attendance($file)
    {
        Excel::import(new AttendanceImport(), $file);
    }

    public function getAttendanceById($employee_id)
    {
        $attendances = Attendance::where('employee_id', $employee_id)->get();
        $attendances->map(function ($attendance) {
            $attendance->total_hours = $this->calculateWorkingHours($attendance->check_in, $attendance->check_out);
            return $attendance;
        });
        return $attendances;
    }

    private function calculateWorkingHours($checkin, $checkout)
    {
        if ($checkin && $checkout) {
            return $checkout->diffInHours($checkin);
        }
        return null;
    }
}
