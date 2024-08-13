<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    //Show user
    public function showProfile() {
        $user = Auth::user();
    
        return view('users.showprofile', [
            'user' => $user
        ]);
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'birthday' => ['required'],
            'aboutme' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        if($request->hasFile('avatar')) {
            $formFields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with('message', 'Gebruiker aangemaakt en ingelogd');
    }

    //Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'U bent uitgelogd!');
    }

    //Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Je bent ingelogd!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function updateProfile(Request $request) {
        // Retrieve the currently authenticated user
        $user = auth()->user();
    
        // Validate the incoming request data
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'birthday' => ['required', 'date'],
            'aboutme' => ['required'],
            'email' => ['required', 'email'],
        ]);
    
        // Check if the user has provided a new password
        if ($request->filled('password')) {
            // Validate and hash the new password
            $passwordValidation = $request->validate([
                'password' => 'confirmed|min:6',
            ]);
            $formFields['password'] = bcrypt($passwordValidation['password']);
        }
    
        // Check if the user has uploaded a new avatar
        if ($request->hasFile('avatar')) {
            // Delete the old avatar if it exists
            if ($user->avatar && Storage::exists('public/' . $user->avatar)) {
                Storage::delete('public/' . $user->avatar);
            }
    
            // Store the new avatar and update the form fields with its path
            $formFields['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }
    
        // Update the user's profile with the validated form fields
        $user->update($formFields);
    
        // Redirect the user back to the homepage with a success message
        return redirect('/')->with('message', 'Gegevens bijgewerkt!');
    }
}
