<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserCreatedMail;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,name', // Validate each role exists in the roles table

        ]);

        // Generate random password
        $tempPassword = Str::random(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($tempPassword),
            'force_password_change' => true, // Force password change on first login
        ]);

        // Assign default role if needed
        $user->syncRoles($request['roles'] ?? ['reporter']);

        try {
        // 📧 Send mail with temporary password
            Mail::to($user->email)->send(new UserCreatedMail($user, $tempPassword));
            Log::info("User creation email sent to {$user->email}");
        } catch (Exception $e) {
            Log::error("Failed to send mail to {$user->email}: " . $e->getMessage());
        }

        event(new Registered($user)); // This triggers Laravel's built-in email verification

        // Auth::login($user);

        return redirect(route('login'))->with('success', 'Account created successfully! Please check your email for login details.');

    }
}
