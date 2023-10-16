<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required|min:5',
        ]);

        if (Auth::attempt($user)) {
            return redirect()->route('backend.dashboard')->with('success', 'Login successful!');
        } else {
            return back()->withErrors('Please enter valid details!');
        }
    }
}
