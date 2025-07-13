{{-- <x-guest-layout>
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

 <!-- Modal Footer with Close Button -->
            <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200">
                <button type="button" 
                        class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        onclick="document.getElementById('terms-modal').classList.add('hidden')">
                    I Understand
                </button>
            </div>
        </div>
    </div>

   

    </div>
     <!-- Add this script to close modal when clicking outside -->
    <script>
        document.getElementById('terms-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
</x-guest-layout> --}}
{{-- @extends('layouts.landing')
@section('content')
<body class="h-full m-0 p-0">
		<section class="h-screen bg-gradient-to-br">
			<div class="min-h-screen flex max-w-4xl mx-auto">
				<!-- Left Side - Login Form -->
				<div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white">
					<div class="max-w-md w-full space-y-8">
						<!-- Logo and Header -->
						<div class="text-left">
							<!-- Logo and Brand -->
							<div class="flex items-center justify-center space-x-4 mb-12">
								<div class="flex-shrink-0">
									<div class="h-12 w-12">
										<img src="/assets/images/benue-logo.png" alt="" />
									</div>
								</div>
								<div
									class="hidden sm:block text-[#232323] font-normal text-[11px] tracking-normal font-jaka leading-[120%]">
									
									<p>Procurement and Project</p>
									<p>Management System</p>
								</div>
								<!-- Mobile brand text -->
								<div class="sm:hidden">
									<div class="text-gray-900 font-bold text-base">BSPP</div>
									<div class="text-gray-600 text-sm">Procurement System</div>
								</div>
							</div>

							<div class="text-center">
								<h1
									class="font-sora font-semibold text-[33px] leading-[160%] tracking-[0%] text-[#232323]">
									Welcome Back!
								</h1>
								<p class="text-gray-600 text-sm">Log in to Continue</p>
							</div>
						</div>

						<!-- Login Form -->
						<form class="mt-8 space-y-6">
							<div class="space-y-4">
								<div>
									<label
										for="email"
										class="block font-jaka font-bold text-sm leading-[120%] tracking-[0%] text-[#292929] mb-1"
										>Email Address</label
									>
									<input
										id="email"
										name="email"
										type="email"
										placeholder="yourname@email.com"
										class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green focus:border-transparent placeholder-gray-400" />
								</div>

								<div>
									<label
										for="password"
										class="block font-jaka font-bold text-sm leading-[120%] tracking-[0%] text-[#292929] mb-1">
										Password
									</label>

									<!-- Flex wrapper for input and icon -->
									<div
										class="flex items-center border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-benue-green overflow-hidden">
										<input
											id="password"
											name="password"
											type="password"
											placeholder="Password"
											class="flex-1 px-3 py-3 focus:outline-none placeholder-gray-400 font-jaka font-normal font-base leading-[22.4px] tracking-normal" />

										<!-- Toggle Button -->
										<button
											type="button"
											id="togglePassword"
											class="px-3 h-full flex items-center bg-transparent">
											<svg
												id="eyeIcon"
												class="h-5 w-5 text-gray-400"
												fill="none"
												stroke="currentColor"
												viewBox="0 0 24 24">
												<path
													stroke-linecap="round"
													stroke-linejoin="round"
													stroke-width="2"
													d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
												<path
													stroke-linecap="round"
													stroke-linejoin="round"
													stroke-width="2"
													d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
											</svg>
										</button>
									</div>
								</div>
							</div>

							<div class="text-right">
								<a
									href="forgot-password.html"
									class="font-jaka font-normal text-base leading-[22.4px] tracking-normal text-[#535353]"
									>Forgot password?</a
								>
							</div>

							<button
								type="submit"
								class="w-full bg-green-800 text-white py-4 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-benue-gree transition-colors duration-200 font-sora font-bold font-base leading-[120%] tracking-normal">
								Log In
							</button>

							<div class="text-center">
								<p
									class="font-jaka font-bold font-base leading-[120%] tracking-normal text-[#535353]">
									Don't have an account?
									<a
										href="register.html"
										class="text-benue-green text-green-800 font-bold"
										>Register</a
									>
								</p>
							</div>
						</form>
					</div>
				</div>

				<!-- Right Side - Background Image -->
				<div class="hidden lg:block lg:w-1/2 relative">
					<img
						src="/assets/images/signup-image.png"
						class="absolute bottom-0 left-0 z-50"
						alt="" />
					<div class="absolute inset-0 bg-[#F2FFDB] z-30"></div>
					<div class="relative h-full flex items-center justify-center">
						<div class="text-center p-8">
							<!-- State Emblem Placeholder -->
							<div
								class="relative z-40 w-76 h-76 mx-auto mb-8 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
								<div
									class="w-76 h-auto bg-white/30 rounded-full flex items-center justify-center">
									<img
										src="/assets/images/benue-logo.png"
										class="w-76 h-auto opacity-25"
										alt="benue logo" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- JavaScript to toggle password visibility -->
		<script>
			const passwordInput = document.getElementById("password")
			const toggleBtn = document.getElementById("togglePassword")
			const eyeIcon = document.getElementById("eyeIcon")

			toggleBtn.addEventListener("click", () => {
				const isPassword = passwordInput.type === "password"
				passwordInput.type = isPassword ? "text" : "password"

				// Optional: icon toggle (eye/eye-off)
				eyeIcon.innerHTML = isPassword
					? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.953 9.953 0 012.43-4.362m2.61-2.611A9.956 9.956 0 0112 5
                c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.51 5.681M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 3l18 18" />`
					: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5
                c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7
                -4.477 0-8.268-2.943-9.542-7z" />`
			})
		</script>
	</body>
@endsection --}}
{{-- @extends('layouts.landing')
@section('content')
<body class="h-full m-0 p-0 relative bg-gray-50">

    <!-- Centered, Small Background Image Behind Form -->
    <div class="fixed inset-0 z-0 flex items-center justify-center pointer-events-none">
        <img src="/assets/images/signup-image.png"
             class="w-96 max-w-full opacity-30 select-none"
             alt="Signup Illustration" />
    </div>

    <section class="relative z-10 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-5xl bg-white bg-opacity-90 rounded-xl shadow-lg p-10 mx-auto">
            <!-- Logo and Header -->
            <div class="mb-12 flex items-center space-x-4 justify-center">
                <img src="/assets/images/benue-logo.png" alt="Benue Logo" class="h-12 w-12" />
                <div class="hidden sm:block text-[#232323] font-normal text-[11px] tracking-normal font-jaka leading-[120%]">
                    <p>Procurement and Project</p>
                    <p>Management System</p>
                </div>
                <div class="sm:hidden">
                    <div class="text-gray-900 font-bold text-base">BSPP</div>
                    <div class="text-gray-600 text-sm">Procurement System</div>
                </div>
            </div>

            <h1 class="font-sora font-semibold text-[33px] leading-[160%] tracking-[0%] text-[#232323] mb-2 text-center">
                Create an Account
            </h1>
            <p class="text-gray-600 text-sm mb-8 text-center">Register to get started</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Name</label>
                        <input id="name" name="name" type="text" required autofocus autocomplete="name"
                            value="{{ old('name') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <!-- Company Name -->
                    <div>
                        <label for="company_name" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Company Name</label>
                        <input id="company_name" name="company_name" type="text" required
                            value="{{ old('company_name') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>
                    <!-- Phone Number -->
                    <div>
                        <label for="phone_number" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Phone Number</label>
                        <input id="phone_number" name="phone_number" type="tel" required
                            value="{{ old('phone_number') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <!-- Tax Identification Number -->
                    <div>
                        <label for="tax_identification_number" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Tax Identification Number (TIN)</label>
                        <input id="tax_identification_number" name="tax_identification_number" type="text" required
                            value="{{ old('tax_identification_number') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('tax_identification_number')" class="mt-2" />
                    </div>
                    <!-- CAC Registration Number -->
                    <div>
                        <label for="cac_registration_number" class="block font-jaka font-bold text-sm text-[#292929] mb-1">CAC Registration Number</label>
                        <input id="cac_registration_number" name="cac_registration_number" type="text" required
                            value="{{ old('cac_registration_number') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('cac_registration_number')" class="mt-2" />
                    </div>
                    <!-- Business Type -->
                    <div>
                        <label for="business_type" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Business Category/Type</label>
                        <input id="business_type" name="business_type" type="text" required
                            value="{{ old('business_type') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('business_type')" class="mt-2" />
                    </div>
                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Email Address</label>
                        <input id="email" name="email" type="email" required autocomplete="username"
                            value="{{ old('email') }}"
                            placeholder="yourname@email.com"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div>
                        <label for="password" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Password</label>
                        <div class="flex items-center border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-benue-green overflow-hidden">
                            <input id="password" name="password" type="password" required autocomplete="new-password"
                                placeholder="Password"
                                class="flex-1 px-3 py-3 focus:outline-none placeholder-gray-400 font-jaka font-normal font-base leading-[22.4px] tracking-normal" />
                            <button type="button" id="togglePassword" class="px-3 h-full flex items-center bg-transparent">
                                <svg id="eyeIcon" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                            placeholder="Confirm Password"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div>
                    <label for="terms" class="inline-flex items-center">
                        <input id="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" required :value="old('terms')">
                        <span class="ms-2 text-sm text-gray-600">
                            I agree to the
                            <button type="button" class="text-indigo-600 hover:text-indigo-500 underline" onclick="document.getElementById('terms-modal').classList.remove('hidden')">
                                Terms and Conditions
                            </button>
                        </span>
                    </label>
                    <x-input-error :messages="$errors->get('terms')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        Already registered?
                    </a>
                    <button type="submit"
                        class="ms-4 w-full bg-green-800 text-white py-4 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-benue-green transition-colors duration-200 font-sora font-bold font-base leading-[120%] tracking-normal">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Terms and Conditions Modal -->
    <div id="terms-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Terms and Conditions</h3>
                <div class="mt-2 px-7 py-3 text-sm text-gray-500 max-h-96 overflow-y-auto">
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
            <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200">
                <button type="button"
                        class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        onclick="document.getElementById('terms-modal').classList.add('hidden')">
                    I Understand
                </button>
            </div>
        </div>
    </div>

    <!-- Script to close modal when clicking outside and password toggle -->
    <script>
        document.getElementById('terms-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
        // Password visibility toggle
        const passwordInput = document.getElementById("password")
        const toggleBtn = document.getElementById("togglePassword")
        const eyeIcon = document.getElementById("eyeIcon")
        if (toggleBtn) {
            toggleBtn.addEventListener("click", () => {
                const isPassword = passwordInput.type === "password"
                passwordInput.type = isPassword ? "text" : "password"
                eyeIcon.innerHTML = isPassword
                    ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.953 9.953 0 012.43-4.362m2.61-2.611A9.956 9.956 0 0112 5
                        c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.51 5.681M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3l18 18" />`
                    : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5
                        c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7
                        -4.477 0-8.268-2.943-9.542-7z" />`
            })
        }
    </script>
</body>
@endsection --}}

@extends('layouts.landing')
@section('content')
<body class="h-full m-0 p-0 relative bg-gray-50">

    <!-- Centered, More Visible Background Image Behind Form -->
    <div class="fixed inset-0 z-0 flex items-center justify-center pointer-events-none">
        <img src="{{asset('/assets/images/signup-image.png')}}"
             class="w-[32rem] max-w-full opacity-90 select-none"
             alt="Signup Illustration" />
    </div>
    

    <section class="relative z-10 min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-5xl bg-white bg-opacity-95 rounded-xl shadow-lg p-10 mx-auto">
            <!-- Logo and Header -->
            <div class="mb-12 flex items-center space-x-4 justify-center">
                <img src="{{asset('/assets/images/benue-logo.png')}}" alt="Benue Logo" class="h-12 w-12" />
                <div class="hidden sm:block text-[#232323] font-normal text-[11px] tracking-normal font-jaka leading-[120%]">
                    <p>Procurement and Project</p>
                    <p>Management System</p>
                </div>
                <div class="sm:hidden">
                    <div class="text-gray-900 font-bold text-base">BSPP</div>
                    <div class="text-gray-600 text-sm">Procurement System</div>
                </div>
            </div>

            <h1 class="font-sora font-semibold text-[33px] leading-[160%] tracking-[0%] text-[#232323] mb-2 text-center">
                Create an Account
            </h1>
            <p class="text-gray-600 text-sm mb-8 text-center">Register to get started</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name and Email Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Name</label>
                        <input id="name" name="name" type="text" required autofocus autocomplete="name"
                            value="{{ old('name') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div>
                        <label for="email" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Email Address</label>
                        <input id="email" name="email" type="email" required autocomplete="username"
                            value="{{ old('email') }}"
                            placeholder="yourname@email.com"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <!-- Passwords Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Password</label>
                        <div class="flex items-center border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-benue-green overflow-hidden">
                            <input id="password" name="password" type="password" required autocomplete="new-password"
                                placeholder="Password"
                                class="flex-1 px-3 py-3 focus:outline-none placeholder-gray-400 font-jaka font-normal font-base leading-[22.4px] tracking-normal" />
                            <button type="button" id="togglePassword" class="px-3 h-full flex items-center bg-transparent">
                                <svg id="eyeIcon" class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div>
                        <label for="password_confirmation" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                            placeholder="Confirm Password"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <!-- Phone and Business Type Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="phone_number" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Phone Number</label>
                        <input id="phone_number" name="phone_number" type="tel" required
                            value="{{ old('phone_number') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <div>
                        <label for="business_type" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Business Category/Type</label>
                        <input id="business_type" name="business_type" type="text" required
                            value="{{ old('business_type') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('business_type')" class="mt-2" />
                    </div>
                </div>

                <!-- TIN and CAC Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="tax_identification_number" class="block font-jaka font-bold text-sm text-[#292929] mb-1">Tax Identification Number (TIN)</label>
                        <input id="tax_identification_number" name="tax_identification_number" type="text" required
                            value="{{ old('tax_identification_number') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('tax_identification_number')" class="mt-2" />
                    </div>
                    <div>
                        <label for="cac_registration_number" class="block font-jaka font-bold text-sm text-[#292929] mb-1">CAC Registration Number</label>
                        <input id="cac_registration_number" name="cac_registration_number" type="text" required
                            value="{{ old('cac_registration_number') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400" />
                        <x-input-error :messages="$errors->get('cac_registration_number')" class="mt-2" />
                    </div>
                </div>

                <!-- Company Name (Centered, Spans Both Columns) -->
                <div class="md:col-span-2 flex flex-col items-center">
                    <div class="w-full md:w-2/3">
                        <label for="company_name" class="block font-jaka font-bold text-sm text-[#292929] mb-1 text-center">Company Name</label>
                        <input id="company_name" name="company_name" type="text" required
                            value="{{ old('company_name') }}"
                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green placeholder-gray-400 text-center" />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>
                </div>

                <!-- Terms and Conditions (Centered, Spans Both Columns) -->
                <div class="md:col-span-2 flex flex-col items-center">
                    <div class="w-full md:w-2/3">
                        <label for="terms" class="inline-flex items-center justify-center w-full">
                            <input id="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" required :value="old('terms')">
                            <span class="ms-2 text-sm text-gray-600">
                                I agree to the
                                <button type="button" class="text-indigo-600 hover:text-indigo-500 underline" onclick="document.getElementById('terms-modal').classList.remove('hidden')">
                                    Terms and Conditions
                                </button>
                            </span>
                        </label>
                        <x-input-error :messages="$errors->get('terms')" class="mt-2 text-center" />
                    </div>
                </div>

                <!-- Already Registered Link (Centered, Spans Both Columns) -->
                <div class="md:col-span-2 flex flex-col items-center">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-center" href="{{ route('login') }}">
                        Already registered?
                    </a>
                </div>

                <!-- Register Button (Centered, Spans Both Columns) -->
                <div class="md:col-span-2 flex flex-col items-center">
                    <button type="submit"
                        class="w-full md:w-2/3 bg-green-800 text-white py-4 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-benue-green transition-colors duration-200 font-sora font-bold font-base leading-[120%] tracking-normal text-center">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Terms and Conditions Modal -->
    <div id="terms-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Terms and Conditions</h3>
                <div class="mt-2 px-7 py-3 text-sm text-gray-500 max-h-96 overflow-y-auto">
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
            <div class="flex items-center justify-end px-4 py-3 border-t border-gray-200">
                <button type="button"
                        class="px-4 py-2 bg-indigo-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        onclick="document.getElementById('terms-modal').classList.add('hidden')">
                    I Understand
                </button>
            </div>
        </div>
    </div>

    <!-- Script to close modal when clicking outside and password toggle -->
    <script>
        document.getElementById('terms-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
        // Password visibility toggle
        const passwordInput = document.getElementById("password")
        const toggleBtn = document.getElementById("togglePassword")
        const eyeIcon = document.getElementById("eyeIcon")
        if (toggleBtn) {
            toggleBtn.addEventListener("click", () => {
                const isPassword = passwordInput.type === "password"
                passwordInput.type = isPassword ? "text" : "password"
                eyeIcon.innerHTML = isPassword
                    ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.953 9.953 0 012.43-4.362m2.61-2.611A9.956 9.956 0 0112 5
                        c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.51 5.681M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3l18 18" />`
                    : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5
                        c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7
                        -4.477 0-8.268-2.943-9.542-7z" />`
            })
        }
    </script>
    @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        html: '{!! implode('<br>', $errors->all()) !!}',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                });
            </script>
        @endif
</body>
@endsection



