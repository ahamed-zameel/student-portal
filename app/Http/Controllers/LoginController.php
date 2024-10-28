<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
   public function Signup()
   {
    return view ("signup");
   } 
   
   public function AddSignup(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Redirect or return a response
        return redirect()->route('login')->with('success', 'Account created successfully.');
    }

    public function Login()
   {
    return view ("login");
   }

   public function AddLogin(Request $request)
{
    // Validate input data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Find the user by email
    $user = User::where('email', $request->email)->first();

    // Check if the user exists and the password matches
    if ($user && Hash::check($request->password, $user->password)) {
        // Set user session (custom session management)
        session(['user_id' => $user->id, 'user_name' => $user->name]);

        // Redirect to intended page
        return redirect()->intended('subject-list')->with('success', 'Welcome back!');
    }

    // If authentication fails, redirect back with an error
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));
}

public function logout()
    {
        session()->flush();
        return redirect("");
    }


}
