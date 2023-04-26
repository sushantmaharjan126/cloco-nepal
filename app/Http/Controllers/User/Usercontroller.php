<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class Usercontroller extends Controller
{

    // public function __construct()
    // {
    //     // $this->user_id = auth()->guard('web')->user();
    //     // dd($this->user_id);
    //     $this->middleware(function ($request, $next) {
    //         $this->user_id = auth()->user();
    //         return $next($request);
    //     });
    // }

    public function index()
    {
        $user_id = auth()->user()->id;

        $query = DB::select("SELECT * FROM users WHERE id <> $user_id");
        // $query = DB::select("SELECT * FROM users ");
        // dd($users);
        $page = request()->query('page', 1);
        $perPage = 10;
        $items = collect($query);
        $paginator = new Paginator($items->forPage($page, $perPage), $perPage, $page);

        $users = $paginator;
        return view('user.list.users', compact('users'));
    }

    public function create()
    {
        return view('user.form.user');
    }

    public function store(Request $request)
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

        $first_name = request('first_name');
        $last_name = request('last_name');
        $email = request('email');
        $password = bcrypt(request('password'));
        $phone = request('phone');
        $address = request('address');
        $dob = request('dob');
        $gender = request('gender');

        $sql = "INSERT INTO users (first_name, last_name, email, password, phone, address, dob, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $params = [$first_name, $last_name, $email, $password, $phone, $address, $dob, $gender];
        $success = DB::insert($sql, $params);

        if ($success) {
            return redirect()->route('user.users.get')->with('success_message', 'User created successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to create user');
        }

    }

    public function edit($id)
    {
        $user = DB::select("SELECT * FROM users WHERE id = $id");
        // dd($user[0]->id);
        return view('user.form.user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'dob' => 'required',
            'gender' => 'required',
        ]);

        // validate if password exists
        if (request('password') != null) {
            $pass = (['password' => request('password')]);
            
        } else {
            $pass = ([]);
        }

        $v = Validator::make($pass, [
            'password' => 'min:8'
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        } else {
            $data = bcrypt(request('password'));
            // $password = $data;
            DB::update('UPDATE users SET password = ? WHERE id = ?', [$data, $id]);
        }
        // validate if password exists

        $first_name = request('first_name');
        $last_name = request('last_name');
        $email = request('email');
        
        $phone = request('phone');
        $address = request('address');
        $dob = request('dob');
        $gender = request('gender');

        // dd($gender);

        // $success = DB::update("UPDATE users SET first_name = $first_name, last_name = $last_name, email = $email, phone = $phone, address = $address, dob = $dob, gender = $gender WHERE id = $id");
        $success = DB::update('UPDATE users SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ?, dob = ?, gender = ? WHERE id = ?', [$first_name, $last_name, $email, $phone, $address, $dob, $gender, $id]);

        // dd($success);

        if ($success) {
            return redirect()->route('user.users.get')->with('success_message', 'User Updated successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to update user');
        }
    }

    public function destory($id)
    {
        $success = DB::delete("DELETE from users where id = $id");

        if ($success) {
            return redirect()->route('user.users.get')->with('success_message', 'User Deleted successfully');
        } else {
            return redirect()->back()->with('error_message', 'Failed to delete user');
        }
    }
}
