<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserCreatedMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminUserController extends Controller
{
    // Show all users (optional)
    public function index()
    {
        $users = User::latest()->get(); // Or paginate(10)
        return view('layouts.admin.users.index', compact('users'));
    }

    // Approve a user
    public function approveUser($id)
    {
        $user = User::findOrFail($id);

        // If already approved, skip
        if ($user->is_authorized) {
            return redirect()->back()->with('info', 'User already approved.');
        }

        $user->is_authorized = true;
        $user->is_active = true;
        $user->save();

        // Send approval email with the already stored temp_password
        try {
            Mail::to($user->email)->send(new UserCreatedMail($user));
            Log::info("User approval email sent to {$user->email}");
        } catch (\Exception $e) {
            Log::error("Failed to send approval email to {$user->email}: " . $e->getMessage());
        }

        // Optional: Send approval email

        return redirect()->back()->with('success', 'User approved successfully.');
    }
    public function disableUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = false;
        $user->save();

        return redirect()->back()->with('success', 'User disabled successfully.');
    }

    public function enableUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = true;
        $user->save();

        return redirect()->back()->with('success', 'User enabled successfully.');
    }
}
