{{-- @extends('layouts.superadmin')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold">User Management</h3>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg" onclick="openAddUserModal()">
                        Add New User
                    </button>
                </div>

                <!-- Users Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $user->roles->first()->name ?? 'No Role' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="openEditModal('{{ $user->id }}')">
                                        Edit
                                    </button>
                                    @if(!$user->hasRole('vendor'))
                                    <button class="text-red-600 hover:text-red-900" onclick="confirmDelete('{{ $user->id }}')">
                                        Delete
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Edit User Modal -->
                <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit User Role</h3>
                            <form id="editUserForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Select Role</label>
                                    <select name="role" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                                        <option value="admin">Admin</option>
                                        <option value="procurement-officer">Procurement Officer</option>
                                        <option value="superadmin">Super Admin</option>
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 text-gray-500 hover:text-gray-700">
                                        Cancel
                                    </button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openEditModal(userId) {
        document.getElementById('editUserForm').action = `/users/${userId}/update-role`;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            // Submit delete request
            fetch(`/users/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        }
    }
</script>
@endpush
<x-add-user-modal />
@endsection --}}
@extends('layouts.superadmin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold">User Management</h3>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg" onclick="openAddUserModal()">
                        Add New User
                    </button>
                </div>

                <!-- Users Table -->
                <div class="overflow-x-auto">
                    <table id="usersTable" class="min-w-full bg-white border border-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Role</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $user->roles->first()->name ?? 'No Role' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="text-blue-600 hover:text-blue-900 mr-3" onclick="openEditModal('{{ $user->id }}')">
                                        Edit
                                    </button>
                                    @if(!$user->hasRole('vendor'))
                                    <button class="text-red-600 hover:text-red-900" onclick="confirmDelete('{{ $user->id }}')">
                                        Delete
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Edit User Modal -->
                <div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
                    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                        <div class="mt-3">
                            <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Edit User Role</h3>
                            <form id="editUserForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Select Role</label>
                                    <select name="role" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                                        <option value="admin">Admin</option>
                                        <option value="procurement-officer">Procurement Officer</option>
                                        <option value="superadmin">Super Admin</option>
                                    </select>
                                </div>
                                <div class="flex justify-end">
                                    <button type="button" onclick="closeEditModal()" class="mr-2 px-4 py-2 text-gray-500 hover:text-gray-700">
                                        Cancel
                                    </button>
                                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('styles') --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
{{-- @endpush

@push('scripts') --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#usersTable').DataTable({
            responsive: true,
            columnDefs: [
                { orderable: false, targets: 3 }
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search users..."
            },
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50]
        });
    });

    function openEditModal(userId) {
        document.getElementById('editUserForm').action = `/users/${userId}/update-role`;
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    function confirmDelete(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            fetch(`/users/${userId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        }
    }
</script>
{{-- @endpush --}}

<x-add-user-modal />
@endsection
