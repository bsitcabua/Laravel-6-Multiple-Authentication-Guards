<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {
        if(auth()->guard('admin')->check())
            return redirect('/admin');
        
        return view('pages.admin_login');
    }

    public function store(Request $request)
    {
        // Validate the user
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');

        // Log the user In

        if(! Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
                'message' => 'Invalid credentials'
            ])->withInput();
        }

        // Redirect
        return redirect('/admin');
        
    }

    public function logout()
    {
        // Auth::logout();
        auth()->guard('admin')->logout();
        
        // session message
        // session()->flash('msg', 'You have been logged out');

        return redirect('/admin/login')->with('msg', 'You have been logged out');
        // ->route('admin.logout') 
    }
}
