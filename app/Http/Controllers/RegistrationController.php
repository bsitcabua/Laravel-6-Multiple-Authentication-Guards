<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    
    public function index()
    {
        return view('pages.user_signup');
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required||min:5|max:100',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:5',
            
        ]);

        // Save data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => bcrypt($request->password)
        ]);

        // Sign the user in
        auth()->login($user);

        // Redirect
        return redirect('/dashboard');
    }
}
