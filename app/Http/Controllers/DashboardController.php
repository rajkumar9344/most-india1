<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Display the home page (dashboard)
    public function index()
    {
        
        return view('home'); // Loads home.blade.php
    }

    // Profile method remains unchanged
    public function profile()
    {
        return view('profile'); // Loads profile.blade.php
    }
}
