@extends('layouts.superadmin')
@section('content')
<div class="py-6 sm:py-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 sm:p-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-3 sm:space-y-0">
            <h3 class="text-2xl font-semibold text-gray-900">MDA Management</h3>
            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shrink-0" onclick="openAddMdaModal()">
                Add New MDA
            </button>
        </div>

        <!-- MDAs Table -->
        <div class="overflow-x-auto rounded border border-gray-300">
            <table id="mdasTable" class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap">
                            Name
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap">
                            Description
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide whitespace-nowrap">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($mdas as $mda)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 whitespace-nowrap text-gray-900 font-medium">
                            {{ $mda->name }}
                        </td>
                        <td class="px-4 py-3 break-words max-w-xs sm:max-w-md">
                            {{ $mda->description }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-sm flex flex-wrap gap-3">
                            <button class="text-blue-600 hover:text-blue-900" onclick="openEditModal('{{ $mda->id }}', '{{ $mda->name }}', `{{ addslashes($mda->description) }}`)">
                                Edit
                            </button>
                            <button class="text-red-600 hover:text-red-900" onclick="confirmDelete('{{ $mda->id }}')">
                                Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Add MDA Modal -->
        <div id="addMdaModal"
            class="hidden fixed inset-0 bg-gray-700 bg-opacity-60 flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Add New MDA</h3>
                <form action="{{ route('mda.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="mb-4">
                        <label for="addMdaName" class="block text-gray-700 text-sm font-semibold mb-2">Name</label>
                        <input id="addMdaName" type="text" name="name" required
                            class="w-full rounded border border-gray-300 p-2 text-gray-700 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" />
                    </div>
                    <div class="mb-4">
                        <label for="addMdaDescription" class="block text-gray-700 text-sm font-semibold mb-2">Description</label>
                        <textarea id="addMdaDescription" name="description" rows="3"
                            class="w-full rounded border border-gray-300 p-2 text-gray-700 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeAddMdaModal()" class="px-4 py-2 text-gray-600 hover:text-gray-900 rounded">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Create MDA
                        </button>
                    </div>
                </form>
                <button aria-label="Close modal" onclick="closeAddMdaModal()"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Edit MDA Modal -->
        <div id="editMdaModal"
            class="hidden fixed inset-0 bg-gray-700 bg-opacity-60 flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-6">Edit MDA</h3>
                <form id="editMdaForm" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="editMdaName" class="block text-gray-700 text-sm font-semibold mb-2">Name</label>
                        <input id="editMdaName" type="text" name="name" required
                            class="w-full rounded border border-gray-300 p-2 text-gray-700 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500" />
                    </div>
                    <div class="mb-4">
                        <label for="editMdaDescription" class="block text-gray-700 text-sm font-semibold mb-2">Description</label>
                        <textarea id="editMdaDescription" name="description" rows="3"
                            class="w-full rounded border border-gray-300 p-2 text-gray-700 focus:outline-none focus:border-green-500 focus:ring-1 focus:ring-green-500"></textarea>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEditModal()" class="px-4 py-2 text-gray-600 hover:text-gray-900 rounded">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Update MDA
                        </button>
                    </div>
                </form>
                <button aria-label="Close modal" onclick="closeEditModal()"
                    class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>


{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" /> --}}
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />
  
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mdasTable').DataTable({
            responsive: true,
            columnDefs: [
                { orderable: false, targets: 2 } // Disable ordering on Actions column
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search MDAs..."
            },
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50]
        });
    });

    function openAddMdaModal() {
        document.getElementById('addMdaModal').classList.remove('hidden');
    }

    function closeAddMdaModal() {
        document.getElementById('addMdaModal').classList.add('hidden');
    }

    function openEditModal(id, name, description) {
        document.getElementById('editMdaForm').action = `/mda/${id}`;
        document.getElementById('editMdaName').value = name;
        document.getElementById('editMdaDescription').value = description;
        document.getElementById('editMdaModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editMdaModal').classList.add('hidden');
    }

    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this MDA?')) {
            fetch(`/mda/${id}`, {
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
@endsection
