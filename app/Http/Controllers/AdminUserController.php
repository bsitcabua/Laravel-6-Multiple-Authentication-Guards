<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function __construct()
    {
        // Applied to all methods except logout()
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {   
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
        // Destroy Admin Auth
        auth()->guard('admin')->logout();

        // Redirect
        return redirect('/admin/login')->with('msg', 'You have been logged out');
    }
}
