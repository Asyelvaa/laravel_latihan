<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);
        $credentials['password'] = Hash::make($credentials['password']);

        User::create($credentials);
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('student.show')
            ->withSuccess('You have successfully registered & logged in!');
        // session()->flash('success', 'Register success, Silahkan login');
        // return redirect('login.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        return view('login.register', [
            "title" => "Register"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
