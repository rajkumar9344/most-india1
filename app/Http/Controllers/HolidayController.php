<?php

namespace App\Http\Controllers;

use App\Models\Holiday;

use Illuminate\Http\Request;

class HolidayController extends Controller
{

    public function index()
    {

        // Get all holidays from the database and paginate them
        // $holidays = Holiday::paginate(2); // Adjust pagination as needed
        $holidays = Holiday::get(); // Adjust pagination as needed

        // Return the view with the holidays
        return view('holiday.index', compact('holidays'));
    }

    public function create()
    {
        return view('holiday.create');
    }
    public function store(Request $request)
    {
        // Validate the holiday data
        $request->validate([
            'holiday_date' => 'required|date',
            'holiday_name' => 'required|string|max:255',
            'comment' => 'nullable|string|max:255',
        ]);
    
        // Check if the holiday already exists with the same date and name
        $existingHoliday = Holiday::where('holiday_date', $request->input('holiday_date'))
            ->where('holiday_name', $request->input('holiday_name'))
            ->exists();
    
        if ($existingHoliday) {
            return redirect()->route('holiday.index')->with('error', 'Holiday with the same date and name already exists.');
        }
    
        // Create a new holiday entry
        Holiday::create([
            'holiday_date' => $request->input('holiday_date'),
            'holiday_name' => $request->input('holiday_name'),
            'comment' => $request->input('comment'),
        ]);
    
        return redirect()->route('holiday.index')->with('success', 'Holiday added successfully!');
    }
    }
