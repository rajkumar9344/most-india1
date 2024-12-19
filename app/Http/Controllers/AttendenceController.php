<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

class AttendenceController extends Controller
{
    // Display employee data filtered by department
    public function index(Request $request)
    {
        $department = $request->input('department', '');

        $employees = Employee::when($department, function ($query) use ($department) {
            return $query->where('department', $department);
        })->get();

        $departments = Employee::distinct('department')->pluck('department');

        return view('attendance.index', compact('employees', 'departments'))->with('username', session('username'));
    }

    public function getEmployeesByDepartment(Request $request)
    {
        $department = $request->input('department', 'All');
        $date = $request->input('date', date('Y-m-d'));

        if ($department === 'All') {
            $employees = Employee::all();
        } else {
            $employees = Employee::where('department', $department)->get();
        }

        $attendance = Attendance::where('date', $date)->get()->keyBy('employee_id');

        return response()->json(['employees' => $employees, 'attendance' => $attendance]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'check_in' => 'required|array',
            'check_out' => 'required|array',
            'status' => 'required|array',
        ]);

        $date = $request->input('date');

        foreach ($request->input('check_in') as $employeeId => $checkIn) {
            $attendanceData = [
                'employee_id' => $employeeId,
                'date' => $date,
                'check_in' => $checkIn,
                'check_out' => $request->input("check_out.$employeeId"),
                'status' => $request->input("status.$employeeId"),
                'updated_at' => now(),
            ];

            $attendance = Attendance::where('employee_id', $employeeId)
                                     ->where('date', $date)
                                     ->first();

            if ($attendance) {
                $attendance->update($attendanceData);
            } else {
                $attendanceData['created_at'] = now();
                Attendance::create($attendanceData);
            }
        }

        return redirect()->back()->with('success', 'Attendance saved/updated successfully.');
    }
}
