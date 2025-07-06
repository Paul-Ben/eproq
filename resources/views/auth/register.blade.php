<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Company Name -->
        <div class="mt-4">
            <x-input-label for="company_name" :value="__('Company Name')" />
            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required />
            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Tax Identification Number -->
        <div class="mt-4">
            <x-input-label for="tax_identification_number" :value="__('Tax Identification Number (TIN)')" />
            <x-text-input id="tax_identification_number" class="block mt-1 w-full" type="text" name="tax_identification_number" :value="old('tax_identification_number')" required />
            <x-input-error :messages="$errors->get('tax_identification_number')" class="mt-2" />
        </div>

        <!-- CAC Registration Number -->
        <div class="mt-4">
            <x-input-label for="cac_registration_number" :value="__('CAC Registration Number')" />
            <x-text-input id="cac_registration_number" class="block mt-1 w-full" type="text" name="cac_registration_number" :value="old('cac_registration_number')" required />
            <x-input-error :messages="$errors->get('cac_registration_number')" class="mt-2" />
        </div>

        <!-- Business Type -->
        <div class="mt-4">
            <x-input-label for="business_type" :value="__('Business Category/Type')" />
            <x-text-input id="business_type" class="block mt-1 w-full" type="text" name="business_type" :value="old('business_type')" required />
            <x-input-error :messages="$errors->get('business_type')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Terms and Conditions -->
        <div class="mt-4">
            <label for="terms" class="inline-flex items-center">
                <input id="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" required :value="old('terms')">
                <span class="ms-2 text-sm text-gray-600">
                    {{ __('I agree to the') }}
                    <button type="button" class="text-indigo-600 hover:text-indigo-500 underline" onclick="document.getElementById('terms-modal').classList.remove('hidden')">
                        {{ __('Terms and Conditions') }}
                    </button>
                </span>
            </label>
            <x-input-error :messages="$errors->get('terms')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Terms and Conditions Modal -->
    <div id="terms-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Terms and Conditions</h3>
                <div class="mt-2 px-7 py-3 text-sm text-gray-500 max-h-96 overflow-y-auto">
                    <!-- Add your terms and conditions content here -->
                    <p class="mb-4">Welcome to eProQ. By registering for an account, you agree to be bound by the following terms and conditions:</p>
                    
                    <h4 class="font-medium mb-2">1. Account Registration</h4>
                    <p class="mb-4">You must provide accurate and complete information during the registration process. You are responsible for maintaining the confidentiality of your account credentials.</p>
                    
                    <h4 class="font-medium mb-2">2. Use of Service</h4>
                    <p class="mb-4">You agree to use the service in compliance with all applicable laws and regulations. Any misuse of the service may result in immediate termination of your account.</p>
                    
                    <h4 class="font-medium mb-2">3. Privacy</h4>
                    <p class="mb-4">Your use of the service is also governed by our Privacy Policy. Please review our Privacy Policy to understand how we collect and use your information.</p>
                    
                    <h4 class="font-medium mb-2">4. Modifications</h4>
                    <p class="mb-4">We reserve the right to modify these terms at any time. Continued use of the service after such modifications constitutes acceptance of the updated terms.</p>
                </div>
                <div class="flex items-center justify-end px-4 py-3">
                    <button type="button" class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500" onclick="document.getElementById('terms-modal').classList.add('hidden')">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
