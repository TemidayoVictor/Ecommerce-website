<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $pageTitle = "All Users";
        $users = User::with('order')->latest()->paginate(10); // Fetch users with pagination
        return view('admin.users.index', [
            'pageTitle' => $pageTitle,
            'users' => $users,
        ]);
    }

    public function create()
    {
        $pageTitle = "Add New User";
        return view('admin.users.create', [
            'pageTitle' => $pageTitle,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'is_admin' => ['nullable', 'boolean'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->has('is_admin') ? 1 : 0,
        ]);

        return redirect()->route('admin.users')->with('success', 'User added successfully!');
    }

}
