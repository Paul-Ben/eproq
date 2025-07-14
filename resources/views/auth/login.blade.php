@extends('layouts.landing')
@section('content')

    <body class="h-full m-2 p-3">
        <main>
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
                                            <img src="{{ asset('/assets/images/benue-logo.png') }}" alt="" />
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
                            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label for="email"
                                            class="block font-jaka font-bold text-sm leading-[120%] tracking-[0%] text-[#292929] mb-1">Email
                                            Address</label>
                                        <input id="email" name="email" type="email" placeholder="yourname@email.com"
                                            required autofocus autocomplete="username"
                                            class="w-full px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-benue-green focus:border-transparent placeholder-gray-400" />
                                        <span>{{ $errors->first('email') }}</span>
                                    </div>

                                    <div>
                                        <label for="password"
                                            class="block font-jaka font-bold text-sm leading-[120%] tracking-[0%] text-[#292929] mb-1">
                                            Password
                                        </label>

                                        <!-- Flex wrapper for input and icon -->
                                        <div
                                            class="flex items-center border border-gray-300 rounded-md focus-within:ring-2 focus-within:ring-benue-green overflow-hidden">
                                            <input id="password" name="password" type="password" placeholder="Password"
                                                required autocomplete="current-password"
                                                class="flex-1 px-3 py-3 focus:outline-none placeholder-gray-400 font-jaka font-normal font-base leading-[22.4px] tracking-normal" />
                                            <span>{{ $errors->first('password') }}</span>

                                            <!-- Toggle Button -->
                                            <button type="button" id="togglePassword"
                                                class="px-3 h-full flex items-center bg-transparent">
                                                <svg id="eyeIcon" class="h-5 w-5 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}"
                                            class="font-jaka font-normal text-base leading-[22.4px] tracking-normal text-[#535353]">Forgot
                                            password?</a>
                                    @endif
                                </div>

                                <button type="submit"
                                    class="w-full bg-green-800 text-white py-4 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-benue-gree transition-colors duration-200 font-sora font-bold font-base leading-[120%] tracking-normal">
                                    Log In
                                </button>

                                <div class="text-center">
                                    <p class="font-jaka font-bold font-base leading-[120%] tracking-normal text-[#535353]">
                                        Don't have an account?
                                        <a href="{{ route('register') }}"
                                            class="text-benue-green text-green-800 font-bold">Register</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Right Side - Background Image -->
                    <div class="hidden lg:block lg:w-1/2 relative">
                        <img src="{{ '/assets/images/signup-image.png' }}" class="absolute bottom-0 left-0 z-50"
                            alt="" />
                        <div class="absolute inset-0 bg-[#F2FFDB] z-30"></div>
                        <div class="relative h-full flex items-center justify-center">
                            <div class="text-center p-8">
                                <!-- State Emblem Placeholder -->
                                <div
                                    class="relative z-40 w-76 h-76 mx-auto mb-8 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                    <div class="w-76 h-auto bg-white/30 rounded-full flex items-center justify-center">
                                        <img src="{{ '/assets/images/benue-logo.png' }}" class="w-76 h-auto opacity-25"
                                            alt="benue logo" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- JavaScript to toggle password visibility -->
        <script>
            const passwordInput = document.getElementById("password")
            const toggleBtn = document.getElementById("togglePassword")
            const eyeIcon = document.getElementById("eyeIcon")

            toggleBtn.addEventListener("click", () => {
                const isPassword = passwordInput.type === "password"
                passwordInput.type = isPassword ? "text" : "password"

                // Optional: icon toggle (eye/eye-off)
                eyeIcon.innerHTML = isPassword ?
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.953 9.953 0 012.43-4.362m2.61-2.611A9.956 9.956 0 0112 5
                    c4.478 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.51 5.681M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3l18 18" />` :
                    `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                    c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7
                    -4.477 0-8.268-2.943-9.542-7z" />`
            })
        </script>
        @if ($errors->has('email') && $errors->first('email') === 'Too many login attempts. Please try again in 1 hour.')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ $errors->first('email') }}',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                });
            </script>
        @endif

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Log in Successful!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#2e8555',
                        timer: 50000,
                        timerProgressBar: true
                    });
                });
            </script>
        @endif

        @if (session('email'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ session('email') }}',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#d33'
                    });
                });
            </script>
        @endif


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


