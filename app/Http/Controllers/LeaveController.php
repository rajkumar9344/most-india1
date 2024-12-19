<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    public function store(Request $request)
    {
        // Validate the leave data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'employee_name' => 'required|string',
            'leave_date' => 'required|date',
            'leave_type' => 'required|string',
            'leave_reason' => 'nullable|string',
        ]);

        try {
            // Create a new leave entry
            Leave::create([
                'employee_id' => $request->input('employee_id'),
                'employee_name' => $request->input('employee_name'),
                'leave_date' => $request->input('leave_date'),
                'leave_type' => $request->input('leave_type'),
                'leave_reason' => $request->input('leave_reason'),
            ]);

            return response()->json(['message' => 'Leave saved successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save leave: ' . $e->getMessage()], 500);
        }
    }

    public function index()
    {
        // Fetch all leave entries
        $leaves = Leave::with('employee')->get();
        return view('attendance.index', compact('leaves'));
    }
}
