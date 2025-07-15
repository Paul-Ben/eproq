<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('superadmin.usermanager', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:superadmin,admin,procurement-officer']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'User created successfully');
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => ['required', 'string', 'in:superadmin,admin,procurement-officer']
        ]);

        // Remove current roles
        $user->roles()->detach();
        
        // Assign new role
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'User role updated successfully');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('vendor')) {
            return response()->json(['message' => 'Cannot delete vendor users'], 403);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}