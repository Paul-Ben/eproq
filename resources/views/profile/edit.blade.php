{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profile - Vendor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <style>
        .font-sora {
            font-family: "Sora", sans-serif;
        }

        .font-jaka {
            font-family: "Sora", sans-serif;
        }

        .side-link-active {
            background: #f0f9ff;
            color: #02611a;
            border-left: 4px solid #02611a;
        }
    </style>
</head>

<body class="bg-gray-50 font-sora">
    {{-- @extends('layouts.vendor')
    @section('content') --}}
    <div class="flex min-h-screen">
        <!-- Include your Sidebar here -->
        {{-- @include('layouts.vendor-sidebar') Adjust path as needed --}}

        <!-- Main content wrapper -->
        <div class="flex-1 flex flex-col min-h-screen ml-64">
            <!-- Include your Top Navigation here -->
            {{-- @include('layouts.vendor-topnav') Adjust path as needed --}}

            <!-- Main Content Area -->
            <main class="flex-1 p-8 bg-gray-50 overflow-auto">
                <h2 class="text-2xl font-bold text-[#232323] mb-6">Profile</h2>

                <div class="space-y-6 max-w-4xl mx-auto">
                    <div class="p-6 bg-white rounded-xl shadow">
                        <div>
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="p-6 bg-white rounded-xl shadow">
                        <div>
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <div class="p-6 bg-white rounded-xl shadow">
                        <div>
                            {{-- @include('profile.partials.delete-user-form') --}}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    

    {{-- Include any necessary scripts here --}}
</body>

</html>
