<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // <-- Add this line
use Illuminate\Support\Facades\Cookie; // <-- Add this line
use App\Models\User;

use Illuminate\Routing\Controller as BaseController;

class AuthController extends BaseController
{

    public function __construct()
{
    $this->middleware('auth')->except(['loginPage', 'login']);
}
    // Show login page
  public function loginPage()
{

    return view('welcome');
}

    // Handle login logic with session
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
    
        // Find the user by username
        $user = User::where('username', $request->username)->first();
    
        // Verify the user exists and the password is correct
        if ($user && Hash::check($request->password, $user->password)) {
            // Manually authenticate the user for Laravel's auth system
            Auth::login($user);
    
            // Store additional custom information in the session
            $request->session()->put('user_id', $user->id);
            $request->session()->put('username', $user->username);
    
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();
    
            // Redirect to the intended page (e.g., dashboard)
            return redirect()->intended('dashboard');
        }
    
        // If login fails, return with an error message
        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ]);
    }
    
    // Show register page
    public function registerPage()
    {
        return view('register'); // Show the 'register' view for registration
    }

    // Handle registration logic with session
    public function register(Request $request)
    {
        // dd($request->all());
        // Validate input
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|confirmed', // Password confirmation field
        ]);

        // Create a new user
        $user = User::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Store user information in session
        $request->session()->put('user_id', $user->id);
        $request->session()->put('username', $user->username);

        // Redirect to the login page or home page
        return redirect()->intended('home');
    }

   // Handle logout logic
   public function logout(Request $request)
   {
       Auth::logout(); // Log the user out of the application

       // Invalidate the session and regenerate the CSRF token
       $request->session()->invalidate();
       $request->session()->regenerateToken();

       
       // cookie delete
         $cookie = Cookie::forget('remember_token');
            return redirect('login')->withCookie($cookie);
   }

   


   
   
}
