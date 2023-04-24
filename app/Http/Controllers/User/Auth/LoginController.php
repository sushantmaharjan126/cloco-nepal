<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // Authentication passed...
            if(Auth::guard('web')->user()->status == 'Banned') {
                Auth::guard('web')->logout();
                return redirect()->back()->withErrors(['message' => 'Your account is banned, Please contact the administration.'])->withInput($request->only('email'));
            }

            $request->session()->regenerate();
            return redirect()->route('web.dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'The provided credentials do not match our records.'])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('web.login');
    }
}
