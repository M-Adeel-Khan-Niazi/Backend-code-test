<?php
namespace AppHumanResources\Attendance\Application;
use App\Imports\AttendanceImport;
use Carbon\Carbon;
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
        $attendances = Attendance::with('employee')->where('employee_id', $employee_id)->get();
        $attendances->map(function ($attendance) {
            $attendance->total_hours = $this->calculateWorkingHours($attendance->check_in, $attendance->check_out);
            return $attendance;
        });
        return $attendances;
    }

    private function calculateWorkingHours($checkin, $checkout)
    {
        if ($checkin && $checkout) {
            return Carbon::make($checkout)->diffInHours($checkin);
        }
        return null;
    }
}
