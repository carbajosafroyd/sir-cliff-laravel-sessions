<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerValidate(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]); 

        $data = $request->all();
        $check = $this->create($data);
        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function create(array $data)
    {
        return \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Illuminate\Support\Facades\Hash::make($data['password']),
        ]);
    }

    public function loginValidate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]); 

        $credentials = $request->only('email', 'password');

        if (\Illuminate\Support\Facades\Auth::attempt($credentials)) {
            return redirect('order')->withSuccess('You have successfully logged in.');
        }

        return back()->withErrors(['all' => 'The provided credentials do not match our records.']);
    }
}
