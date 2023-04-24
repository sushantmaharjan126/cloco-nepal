<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function showForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password_confirmation' => 'required|min:8',
            'password' => 'required|min:8|confirmed',
            'dob' => 'required',
            'gender' => 'required',
        ]);

        $user = new User;

        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->phone = request('phone');
        $user->address = request('address');
        $user->dob = request('dob');
        $user->gender = request('gender');

        $user->save();

        $credentials = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($credentials)) {
        
            // check admin's status
            if(Auth::guard('web')->user()->status == 'Inactive') {
                Auth::guard('web')->logout();

                // return response()->json(['success' => false, 'message' => ['Your account is banned, Please contact the administration.']]);
                return redirect()->back()->with(['error_message' => 'Your account is banned, Please contact the administration.'])->withInput($request->only('email'));
            }

            $request->session()->regenerate();
            // return response()->json(['success' => true, 'message' => 'Login Succesfully.']);
            return redirect()->route('user.dashboard')->with('success_message', 'Login Successfully.');
        }
        return redirect()->back()->with(['error_message' => 'The provided credentials do not match our records.'])->withInput($request->only('email'));

    }
}
