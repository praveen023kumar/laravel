<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        
    }

    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required|email|max:255',
                'password' => 'required'
            ]);

            $email = $request->request->get('username');
            $password = $request->request->get('password');
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                // Authentication passed...
                return redirect()->intended('dashboard');
             }
        } else {
            return view('user.login');
        }
    }
}
