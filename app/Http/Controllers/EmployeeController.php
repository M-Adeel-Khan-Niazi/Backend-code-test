<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->get();
        return response()->json(['employees' => $employees,'message'=>'Employees fetched successfully!']);
    }
}
