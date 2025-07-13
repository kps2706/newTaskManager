<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetch all users
        $users = User::all(); 
        return view('layouts.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $valid_user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'nullable|in:Reporter,Admin,Vendor,Super_Admin',
        ]);

        User::create([
            'name' => $valid_user['name'],
            'email' => $valid_user['email'],
            'password' => bcrypt($valid_user['password']),
            'role' => $valid_user['role'] ?? 'reporter', // default role if null
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findorfail($id);
        return view('layouts.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $for_update_user = User::findorfail($id);

        // dd($for_update_user); print find object

         // Step 2: Validate the form input
         $valid_user = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $for_update_user->id,
            'role' =>'nullable|in:Reporter,Admin,Vendor',
         ]);

        // Update name, email, and role
        $for_update_user->name = $valid_user['name'];
        $for_update_user->email = $valid_user['email'];
        $for_update_user->role = $valid_user['role'] ?? $user->role;

        // update password only if provided
        if(!empty($valid_user['password'])){
            $for_update_user->password = bcrypt($valid_user['password']);
        };

        $for_update_user->save();

        return redirect()->route('user.index')->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully.');
    }
}
