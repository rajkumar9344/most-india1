<?php

//onsite controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Onsite;

class OnsiteController extends Controller
{
    public function create($id)
    {
        // Fetch the specific onsite record using the ID
        $onsite = Onsite::find($id);
    
        // Check if the record exists
        if (!$onsite) {
            return redirect()->route('onsite.index')->with('error', 'Onsite record not found.');
        }
    
        // Pass the fetched record to the view
        return view('attendance.onsite-report.edit', compact('onsite'));
    }
    
    
    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'work_order_number' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'contact_person_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'onsite_date' => 'required|date',
            'from_time' => 'required',
            'to_time' => 'required',
            'comments' => 'nullable|string|max:1000',
        ]);
    
        // Find the onsite record
        $onsite = Onsite::find($id);
    
        // Check if the record exists
        if (!$onsite) {
            return redirect()->route('onsite.index')->with('error', 'Onsite record not found.');
        }
    
        // Update the record with the validated data
        $onsite->update([
            'work_order_number' => $request->input('work_order_number'),
            'customer_name' => $request->input('customer_name'),
            'contact_person_name' => $request->input('contact_person_name'),
            'contact_number' => $request->input('contact_number'),
            'onsite_date' => $request->input('onsite_date'),
            'from_time' => $request->input('from_time'),
            'to_time' => $request->input('to_time'),
            'comments' => $request->input('comment'), // Include the comment field
        ]);
    
        // Redirect back with a success message
        return redirect()->route('onsite.index')->with('success', 'Onsite details and comments updated successfully.');
    }
    
    public function index(Request $request)
    {
        $query = Onsite::query();
    
        // Filter by search query if provided
        if ($request->has('table_search') && $request->table_search !== '') {
            $search = $request->table_search;
            $query->where(function ($q) use ($search) {
                $q->where('employee_id', 'like', '%' . $search . '%')
                    ->orWhere('employee_name', 'like', '%' . $search . '%')
                    ->orWhere('onsite_date', 'like', '%' . $search . '%')
                    ->orWhere('customer_name', 'like', '%' . $search . '%')
                    ->orWhere('contact_person_name', 'like', '%' . $search . '%')
                    ->orWhere('contact_number', 'like', '%' . $search . '%')
                    ->orWhere('from_time', 'like', '%' . $search . '%')
                    ->orWhere('to_time', 'like', '%' . $search . '%')
                    ->orWhere('comments', 'like', '%' . $search . '%')
                    ->orWhere('work_order_number', 'like', '%' . $search . '%');
            });
        }
    
        // Fetch onsite data based on the filtered query
        $onsites = $query->get();
    
        // Return the partial view for the table body if the request is AJAX
        if ($request->ajax()) {
            return view('attendance.onsite-report.partials.onsite_table', compact('onsites'));
        }
    
        // Return the full view for initial page load
        return view('attendance.onsite-report.index', compact('onsites'));
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

        $onsite = Onsite::where('date', $date)->get()->keyBy('employee_id');

        return response()->json(['employees' => $employees, 'onsite' => $onsite]);
    }

    public function store(Request $request)
    {
        // Validate the onsite visit data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'employee_name' => 'required|string',
            'work_order_number' => 'required|string',
            'onsite_date' => 'required|date',
            'customer_name' => 'required|string',
            'contact_person_name' => 'required|string',
            'contact_number' => 'required|digits:10', // Validates a 10-digit phone number
            'from_time' => 'required|date_format:H:i', // Validates time in HH:MM format
            'to_time' => 'required|date_format:H:i|after:from_time', // Ensures 'to_time' is after 'from_time'
            'comments' => 'nullable|string',
        ]);

        try {
            // Create a new onsite entry
            Onsite::create([
                'employee_id' => $request->input('employee_id'),
                'employee_name' => $request->input('employee_name'),
                'work_order_number' => $request->input('work_order_number'),
                'onsite_date' => $request->input('onsite_date'),
                'customer_name' => $request->input('customer_name'),
                'contact_person_name' => $request->input('contact_person_name'),
                'contact_number' => $request->input('contact_number'),
                'from_time' => $request->input('from_time'),
                'to_time' => $request->input('to_time'),
                'comments' => $request->input('comment'),
            ]);

            return response()->json(['message' => 'Onsite visit details saved successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to save onsite visit details: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
{
    $onsite = Onsite::findOrFail($id); // Retrieve the onsite record
    return view('attendance.onsite-report.show', compact('onsite')); // Pass the record to the view
}
}