<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VendorDetail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

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
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'company_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
            'tax_identification_number' => ['required', 'string', 'max:50'],
            'cac_registration_number' => ['required', 'string', 'max:50'],
            'business_type' => ['required', 'string', 'max:100'],
            'terms' => ['required', 'accepted'],
        ], [
            'terms.required' => 'You must accept the Terms and Conditions to register.',
            'terms.accepted' => 'You must accept the Terms and Conditions to register.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create vendor details with terms acceptance
        VendorDetail::create([
            'user_id' => $user->id,
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number,
            'tax_identification_number' => $request->tax_identification_number,
            'cac_registration_number' => $request->cac_registration_number,
            'business_type' => $request->business_type,
            'terms_accepted' => true,
            'agreed_terms_at' => now(),
        ]);

        // Assign vendor role to the newly registered user
        $user->assignRole('vendor');

        // Notify the user about account creation
        $user->notify(new \App\Notifications\VendorAccountCreated());

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
