<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Super Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome Super Admin!</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">User Management</h4>
                            <p>Manage all users and their roles</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">System Settings</h4>
                            <p>Configure system-wide settings</p>
                        </div>
                        <div class="bg-purple-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">Audit Logs</h4>
                            <p>View system audit trails</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>