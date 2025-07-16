<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ForcePasswordResetController extends Controller
{
    //
    public function show()
    {
        return view('auth.force-reset-password');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->force_password_reset = false;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Password reset successful.');
    }
}
