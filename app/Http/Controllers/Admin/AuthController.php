<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Login page
    public function loginPage()
    {
        return view('admin.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    // Dashboard
    public function dashboard()
    {
        $students = Student::all();
        return view('admin.dashboard', compact('students'));
    }
}
