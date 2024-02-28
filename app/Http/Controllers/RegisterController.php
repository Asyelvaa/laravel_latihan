<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        User::create($credentials);
        // $request->flash('success', 'Register berhasil, Silahkan login !');

        // return redirect('/authentication/login');
        // User::create($credentials);
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        return redirect()->route('login')
            ->with('success', 'Register berhasil, Silahkan login !');
        // session()->flash('success', 'Register success, Silahkan login');
        // return redirect('/authentication/login');
        // return redirect('/login');

    }

    /**
     * Display the specified resource.
     */
    public function index(register $register)
    {
        return view('authentication.register', [
            "title" => "Register",
            "users" => User::all()
        ]);
    }

}
