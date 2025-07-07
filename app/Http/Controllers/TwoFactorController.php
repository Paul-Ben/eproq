<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.2fa');
    }

    public function store(Request $request)
    {
        $request->validate(['two_factor_code' => 'required']);

        $user = User::find(session('two_factor_user_id'));

        // if (
        //     !$user ||
        //     $user->two_factor_code !== $request->two_factor_code ||
        //     $user->two_factor_expires_at->lt(now())
        // ) {
        //     return back()->withErrors(['two_factor_code' => 'The code is invalid or expired.']);
        // }
        if (
            !$user ||
            $user->two_factor_code !== $request->two_factor_code ||
            !$user->two_factor_expires_at || // Check if it exists
            $user->two_factor_expires_at->lt(now())
        ) {
            return back()->withErrors(['two_factor_code' => 'The code is invalid or expired.']);
        }

        $user->resetTwoFactorCode();
        Auth::login($user);

        session()->forget('two_factor_user_id');

        // Redirect based on role as before
        if ($user->hasRole('superadmin')) {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('procurement-officer')) {
            return redirect()->route('officer.dashboard');
        } elseif ($user->hasRole('vendor')) {
            return redirect()->route('vendor.dashboard')->with('success', 'Welcome to your dashboard');
        }

        return redirect()->route('dashboard');
    }
}
