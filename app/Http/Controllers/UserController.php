<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserCreatedMail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetch all users
        $users = User::with('roles')->get();
        return view('layouts.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::pluck('name', 'name'); // or just ->pluck('name')
        return view('layouts.users.create', compact('roles'));
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
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name', // Validate each role exists in the roles table

        ]);

        $tempPassword = Str::random(10);

         $user = User::create([
            'name' => $valid_user['name'],
            'email' => $valid_user['email'],
            'password' => bcrypt($tempPassword),
            'force_password_reset' => true,
        ]);

        // Assign selected role(s), or 'reporter' if none provided
        $user->syncRoles($valid_user['roles'] ?? ['reporter']);

        try {
            Mail::to($user->email)->send(new UserCreatedMail($user, $tempPassword));
            Log::info("User creation email sent to {$user->email}");
        } catch (Exception $e) {
            Log::error("Failed to send mail to {$user->email}: " . $e->getMessage());
        }

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
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name')->toArray(); // currently assigned roles
        return view('layouts.users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::findOrFail($id);

        // Validate inputs except password
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name',
        ]);

        // dd($validated);

        // Always update these fields
        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Conditionally update password
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:6|confirmed',
            ]);

            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        // Sync roles
        $user->syncRoles($validated['roles']);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
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
