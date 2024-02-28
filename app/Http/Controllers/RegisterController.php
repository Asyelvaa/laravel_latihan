<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('authentication.register', [
            "title" => "Register",
            "users" => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5'
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        User::create($credentials);

        // return redirect('/auth/login')
        //     ->with('success', 'Register berhasil, Silahkan login !');

        // $request->flash('success', 'Register berhasil, Silahkan login !');

        return redirect('/auth/login');
        // User::create($credentials);
        // Auth::attempt($credentials);
        // $request->session()->regenerate();
        
        // session()->flash('success', 'Register success, Silahkan login');
        // return redirect('/authentication/login');
        // return redirect('/login');

    }

    

}
