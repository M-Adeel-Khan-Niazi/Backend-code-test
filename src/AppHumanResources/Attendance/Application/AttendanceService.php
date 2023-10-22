<?php

use App\Imports\AttendanceImport;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService
{
    public function import_attendance($file)
    {
        Excel::import(new AttendanceImport(), $file);
    }
}
