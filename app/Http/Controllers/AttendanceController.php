<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(\AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function upload(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls'
        ]);
        if ($validation->fails())
            return response()->json($validation->messages(), 422);
        DB::beginTransaction();
        try {
            $this->attendanceService->import_attendance($request->file);
            DB::commit();
            return response()->json(['message' => 'File uploaded and processed successfully']);
        } catch (\Exception $error) {
            DB::rollback();
            return response()->json($error->getMessage(), 400);
        }
    }
}
