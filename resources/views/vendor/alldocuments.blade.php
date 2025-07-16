@extends('layouts.vendor')
@section('content')
<!-- Breadcrumb Card -->
<div class="bg-white rounded-xl shadow-lg p-4 mb-6 flex items-center space-x-2 text-sm font-medium">
        <a href="#" class="text-green-700 hover:underline flex items-center">
            Dashboard
        </a>
        <span class="text-gray-400">/</span>
        <a href="#" class="text-green-700 hover:underline">Vendor</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-600">My Documents</span>
    </div>
  
    <div class="bg-white rounded-xl shadow-2xl p-8 mb-16">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-gray-800">Uploaded Documents</h3>
            <a href="{{ route('vendor.adddocument') }}" class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow transition focus:outline-none focus:ring-2 focus:ring-green-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Document
            </a>
        </div>
        <div class="space-y-6">
            @if(!$hasAnyDocument)
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded mb-6 text-yellow-800">
                    <strong>No documents uploaded yet.</strong> Click <span class="font-semibold">Add Document</span> to get started!
                </div>
            @else
                @foreach($documentFields as $field => $type)
                    @php
                        $file = $vendorDetail->$field;
                    @endphp
                    <div class="flex items-center justify-between bg-gradient-to-r from-green-50 to-green-100 border border-green-200 rounded-lg px-6 py-5 shadow-sm w-full">
                        <div class="flex flex-col">
                            <span class="text-lg font-semibold text-green-900">{{ $type }}</span>
                            <span class="text-sm text-gray-500 mt-1">
                                @if($file)
                                    {{ basename($file) }}
                                @else
                                    <span class="italic text-red-400">Not uploaded</span>
                                @endif
                            </span>
                            <span class="text-xs text-gray-400 mt-0.5">Uploaded: @if($file){{ $vendorDetail->created_at ? $vendorDetail->updated_at->format('Y-m-d H:i') : 'N/A' }}@else - @endif</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition" onclick="openModal('updateModal_{{ $field }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                                Update
                            </button>
                            @if($file)
                                <a href="{{ route('vendor.document.download', ['vendorDetail' => $vendorDetail->id, 'field' => $field]) }}" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition" download>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline w-5 h-5 mr-2 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 4v12" /></svg>
                                    Download
                                </a>
                            @else
                                <button class="bg-gray-300 text-gray-500 font-bold py-2 px-4 rounded-lg cursor-not-allowed" disabled>Download</button>
                            @endif
                        </div>
                    </div>
                    <!-- Update Modal -->
                    <div id="updateModal_{{ $field }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-40">
                        <div class="bg-white rounded-xl shadow-xl p-8 w-full max-w-md mx-auto relative">
                            <button onclick="closeModal('updateModal_{{ $field }}')" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 text-2xl font-bold">&times;</button>
                            <h4 class="text-lg font-bold mb-4">Update {{ $type }}</h4>
                            <form action="{{ route('vendor.documents.update', ['vendorDetail' => $vendorDetail->id, 'field' => $field]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-semibold mb-2">Choose new file (PDF, max 20MB):</label>
                                    <input type="file" name="{{ $field }}" accept="application/pdf" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400" required>
                                </div>
                                <div class="flex justify-end space-x-3">
                                    <button type="button" onclick="closeModal('updateModal_{{ $field }}')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded-lg">Cancel</button>
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
            document.getElementById(id).classList.add('flex');
        }
        function closeModal(id) {
            document.getElementById(id).classList.remove('flex');
            document.getElementById(id).classList.add('hidden');
        }
    </script>
@endsection 