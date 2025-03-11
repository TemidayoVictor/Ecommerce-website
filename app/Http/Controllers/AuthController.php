<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

        public function showCombinedForm()
        {
            // Return the view that contains both login and registration forms
            return view('login'); // This loads resources/views/login.blade.php
        }
        
        public function login(Request $request)
        {
            // Validate and process login
            $credentials = $request->validate([
                'email'    => ['required', 'email'],
                'password' => ['required'],
            ]);
    
            if (\Illuminate\Support\Facades\Auth::attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }
    
            return back()->withErrors([
                'email' => 'Incorrect Email or Password.',
            ])->withInput();
        }
        
        public function register(Request $request)
        {
            // Validate and process registration
            $validated = $request->validate([
                'name'                  => ['required', 'string', 'max:255'],
                'email'                 => ['required', 'email', 'max:255', 'unique:users'],
                'password'              => ['required', 'min:8', 'confirmed'],
            ]);
    
            $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
            
            $user = \App\Models\User::create($validated);
            
            \Illuminate\Support\Facades\Auth::login($user);
            
            return redirect('/');
        }
        
        public function logout(Request $request)
        {
            \Illuminate\Support\Facades\Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }    

