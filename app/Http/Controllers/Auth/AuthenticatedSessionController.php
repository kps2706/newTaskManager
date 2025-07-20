<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\RateLimiter;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$user) {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }

        // Check if locked but over 1 hour ago — auto-unlock
        if (!$user->is_active) {
            if ($user->locked_at && Carbon::parse($user->locked_at)->addHour()->isPast()) {
                $user->is_active = true;
                $user->locked_at = null;
                $user->save();
            } else {
                return back()->withErrors(['email' => 'Your account is locked. Please try again after 1 hour or contact the administrator.']);
            }
        }


        $key = Str::lower('login:' . $request->email);

        // If too many attempts, lock user
        if (RateLimiter::tooManyAttempts($key, 3)) {
            $user->is_active = false;
            $user->locked_at = now(); // mark time of lock
            $user->save();

            return back()->withErrors(['email' => 'Your account has been locked due to multiple failed login attempts.']);
        }

        // Attempt login
        if (!Auth::attempt($request->only('email', 'password'))) {
            RateLimiter::hit($key, 3600); // hit for 1 hour
            return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }

        // Successful login
        RateLimiter::clear($key);

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
