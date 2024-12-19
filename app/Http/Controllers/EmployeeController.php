<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\State;
use App\Models\BloodGroup;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeeExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // List all employees
    // public function index()
    // {
    //     $employees = Employee::orderBy('created_at', 'desc')->get(); 
    //     return view('employee.index', compact('employees'));
    // }

    // Show the create form
    public function create()
    {
        return view('employee.create');
    }

    // Get all states as JSON
    public function getStates()
    {
        $states = State::all();
        return response()->json($states);
    }
    public function getBloodGroup()
    {
        $bloodGroups = BloodGroup::all(); // Fetch all blood groups from the database
        return response()->json($bloodGroups);
    }
    // get all departments
    public function getDepartments()
    {
        $departments = Department::all();
        return response()->json($departments);
    }
    // Store a new employee
    public function store(Request $request)
    {
        $validatedData = $this->validateEmployee($request);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $this->uploadPhoto($request->file('photo'));
        }

        // Create a new employee
        $employee = Employee::create($validatedData);

        // Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Employee added successfully',
            'data' => $employee
        ], 201);
    }

    // Show the edit form
    public function edit($id)
    {


        $employee = Employee::findOrFail($id);
        $states = State::orderBy('name', 'asc')->pluck('name', 'id');
        $bloodGroups = BloodGroup::all(); // Fetch all blood groups
        $departments = Department::all(); // Fetch all departments
        return view('employee.edit', compact('employee', 'states', 'bloodGroups', 'departments'));
    }

    // Update an employee's data
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $validatedData = $this->validateEmployee($request, $id);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $this->uploadPhoto($request->file('photo'));
        }

        if ($employee) {
            // Update the employee record
            $employee->update($validatedData);
            // Return success response
            return response()->json([
                'status' => 'success',
                'message' => 'Employee updated successfully',
                'data' => $employee
            ], 200);
        }

        return response()->json(['message' => 'Employee not found'], 404);
    }

    // Validate employee data
    private function validateEmployee(Request $request, $id = null)
    {
        $uniqueEmployeeId = $id ? "unique:employees,employee_id,$id" : 'unique:employees,employee_id';

        return $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'address_residential' => 'required|string',
            'pin_code' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'address_permanent' => 'required|string',
            'emergency_contact_address' => 'required|string',
            'emergency_contact_name' => 'required|string',
            'emergency_contact_number' => 'required|string',
            'blood_group' => 'nullable|string',
            'mobile_1' => 'required|string',
            'mobile_2' => 'nullable|string',
            'email_personal' => 'required|email',
            'employee_id' => "required|string|$uniqueEmployeeId",
            'department' => 'required|string',
            'designation' => 'required|string',
            'date_of_joining' => 'required|date',
            'date_of_exit' => 'nullable|date',
            'status' => 'required|string',
            'email_official' => 'required|email',
            'account_holder_name' => 'required|string',
            'account_number' => 'required|string',
            'bank_name' => 'required|string',
            'branch' => 'required|string',
            'ifsc_code' => 'required|string',
            'insurance_no' => 'required|string',
            'insurance_to_date' => 'required|date',
            'insurance_from_date' => 'nullable|date',
            'insurance_company_name' => 'required|string',
            'insurance_coverage' => 'nullable|string',
        ]);
    }

    // Handle photo upload
    private function uploadPhoto($photo)
    {
        return $photo->store('photos', 'public');
    }
    // export employee datas
    // Export as Excel
    public function exportExcel()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }

    // Export as CSV
    public function exportCSV()
    {
        return Excel::download(new EmployeeExport, 'employees.csv');
    }

    // Export as PDF
    // public function exportPDF()
    // {
    //     $employees = Employee::all();
    //     $pdf = Pdf::loadView('employee.pdf', compact('employees'));
    //     return $pdf->download('employees.pdf');
    // }
    


    // public function indexSearch(Request $request)
    // {
    //     console.log("request for search",$request);
    //     // Get the search term from the query string
    //     $search = $request->input('table_search');

    //     // Fetch employees, applying the search filter if the search term is present
    //     $employees = Employee::when($search, function ($query, $search) {
    //         return $query->where('first_name', 'like', "%{$search}%")
    //                      ->orWhere('email_personal', 'like', "%{$search}%")
    //                      ->orWhere('department', 'like', "%{$search}%")
    //                      ->orWhere('designation', 'like', "%{$search}%");
    //     })->get(); // You can paginate instead of `get()` if you want pagination.

    //     // Return the view with the filtered employee data
    //     return view('employees.index', compact('employees'));
    // }

    public function index(Request $request)
{
    $query = Employee::query();

    // Filter by search query if provided
    if ($request->has('table_search') && $request->table_search !== '') {
        $search = $request->table_search;
        $query->where(function ($q) use ($search) {
            $q->where('employee_id', 'like', '%' . $search . '%')
                ->orWhere('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                // Add other columns as needed for search
                ->orWhere('department', 'like', '%' . $search . '%')
                ->orWhere('designation', 'like', '%' . $search . '%')
                ->orWhere('email_personal', 'like', '%' . $search . '%')
                ->orWhere('mobile_1', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('date_of_joining', 'like', '%' . $search . '%')
                ->orWhere('date_of_exit', 'like', '%' . $search . '%')
                ->orWhere('blood_group', 'like', '%' . $search . '%')
                ->orWhere('state', 'like', '%' . $search . '%')
                ->orWhere('city', 'like', '%' . $search . '%')
                ->orWhere('country', 'like', '%' . $search . '%')
                ->orWhere('address_residential', 'like', '%' . $search . '%')
                ->orWhere('address_permanent', 'like', '%' . $search . '%')
                ->orWhere('emergency_contact_address', 'like', '%' . $search . '%')
                ->orWhere('emergency_contact_name', 'like', '%' . $search . '%')
                ->orWhere('emergency_contact_number', 'like', '%' . $search . '%')
                ->orWhere('mobile_2', 'like', '%' . $search . '%')
                ->orWhere('email_official', 'like', '%' . $search . '%')
                ->orWhere('account_holder_name', 'like', '%' . $search . '%')
                ->orWhere('account_number', 'like', '%' . $search . '%')
                ->orWhere('bank_name', 'like', '%' . $search . '%')
                ->orWhere('branch', 'like', '%' . $search . '%')
                ->orWhere('ifsc_code', 'like', '%' . $search . '%')
                ->orWhere('insurance_no', 'like', '%' . $search . '%')
                ->orWhere('insurance_from_date', 'like', '%' . $search . '%')
                ->orWhere('insurance_to_date', 'like', '%' . $search . '%')
                ->orWhere('insurance_company_name', 'like', '%' . $search . '%')
                ->orWhere('insurance_coverage', 'like', '%' . $search . '%');
        });
    }

    // Fetch employees based on filtered query
    $employees = $query->get();

    // Return the partial view for the table body
    if ($request->ajax()) {
        return view('employee.partials.employee_table', compact('employees'));
    }

    return view('employee.index', compact('employees'));
}
    // Method to check if Employee ID exists
    public function checkEmployeeIdExistence(Request $request)
    {
        // Validate the employee_id input
        $request->validate([
            'employee_id' => 'required|string|max:255',
        ]);

        // Check if Employee ID already exists in the database
        $exists = Employee::where('employee_id', $request->employee_id)->exists();

        // Return response as JSON
        return response()->json(['exists' => $exists]);
    }


    
    public function exportPDF(Request $request)
    {
        // Log the incoming request data for debugging
        Log::info('Columns received:', [$request->input('columns')]);

        // Map user-friendly column names to actual database column names
        $columnMapping = [
            'ID' => 'id',
            'First Name' => 'first_name',
            'Last Name' => 'last_name',
            'Gender' => 'gender',
            'Date of Birth' => 'date_of_birth',
            'Residential Address' => 'address_residential',
            'Pin Code' => 'pin_code',
            'City' => 'city',
            'Country' => 'country',
            'State' => 'state',
            'Permanent Address' => 'address_permanent',
            // 'Employee Photo' => 'photo', // If needed, uncomment and adjust if you want to include the employee photo column
            'Emergency Contact Address' => 'emergency_contact_address',
            'Emergency Contact Name' => 'emergency_contact_name',
            'Emergency Contact Number' => 'emergency_contact_number',
            'Blood Group' => 'blood_group',
            'Mobile 1' => 'mobile_1',
            'Mobile 2' => 'mobile_2',
            'Personal Email' => 'email_personal',
            'Employee ID' => 'employee_id', // Duplicate column for Employee ID
            'Department' => 'department',
            'Designation' => 'designation',
            'Date of Joining' => 'date_of_joining',
            'Date of Exit' => 'date_of_exit',
            'Official Email' => 'email_official',
            'Account Holder Name' => 'account_holder_name',
            'Account Number' => 'account_number',
            'Bank Name' => 'bank_name',
            'Branch' => 'branch',
            'IFSC Code' => 'ifsc_code',
            'Insurance Number' => 'insurance_no',
            'Insurance From Date' => 'insurance_from_date',
            'Insurance To Date' => 'insurance_to_date',
            'Insurance Company Name' => 'insurance_company_name',
            'Insurance Coverage' => 'insurance_coverage',
            'Status' => 'status', // For the button status (Active/Inactive)
        ];


        // Get the selected columns from the request, or use default columns if not provided
        $columns = $request->input('columns');

        if ($columns) {
            $columns = explode(',', $columns); // Split by comma to get an array of selected columns
        } else {
            // Fallback to default columns if none are selected
            $columns = ['ID', 'Name', 'Email', 'Department', 'Designation'];
        }

        // Map the column names to the database column names
        $columns = array_map(function ($column) use ($columnMapping) {
            return $columnMapping[$column] ?? null; // Use null for unmapped columns
        }, $columns);

        // Remove any null values (in case some columns were not mapped)
        $columns = array_filter($columns);

        // If no valid columns are selected, fall back to default column names
        if (empty($columns)) {
            $columns = ['employee_id', 'first_name', 'email_personal', 'department', 'designation'];
        }

        // Fetch the employees from the database with the selected columns
        $employees = Employee::select($columns)->get();

        // Convert logo to Base64
        $logoPath = public_path('assets/Mostindia-logo.png');
        $base64Logo = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));

        // Pass the selected columns and data to the view for PDF generation
        $pdf = Pdf::loadView('employee.pdf', compact('employees', 'base64Logo', 'columns'));
        return $pdf->download('employees.pdf');
    }


}
