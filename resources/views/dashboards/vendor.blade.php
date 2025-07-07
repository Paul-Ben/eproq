<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vendor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Welcome Vendor!</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">Available Tenders</h4>
                            <p>View and bid on open tenders</p>
                        </div>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">My Bids</h4>
                            <p>Track your bid submissions</p>
                        </div>
                        <div class="bg-yellow-100 p-4 rounded-lg">
                            <h4 class="font-semibold mb-2">Purchase Orders</h4>
                            <p>View and manage received orders</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</x-app-layout>