<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!Auth::check()) {
            return view('dashboard');
        }

        $user = Auth::user();

        if ($user->hasRole('superadmin')) {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('procurement-officer')) {
            return redirect()->route('officer.dashboard');
        } elseif ($user->hasRole('vendor')) {
            return redirect()->route('vendor.dashboard');
        }

        return view('dashboard');
    }
}
