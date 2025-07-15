@extends('layouts.vendor')
@section('content')
<div class="max-w-full mx-auto">
    <!-- Breadcrumb Card -->
    <div class="bg-white rounded-xl shadow-lg p-4 mb-6 flex items-center space-x-2 text-sm font-medium">
        <a href="#" class="text-green-700 hover:underline flex items-center">
            Dashboard
        </a>
        <span class="text-gray-400">/</span>
        <a href="#" class="text-green-700 hover:underline">Vendor</a>
        <span class="text-gray-400">/</span>
        <span class="text-gray-600">Upload Documents</span>
    </div>
    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-2xl p-8 mb-16">
        <h2 class="text-2xl font-bold text-black mb-6 text-left">Upload Vendor Documents</h2>
        <div class="bg-blue-100 border border-blue-300 text-blue-800 rounded-lg px-4 py-3 mb-6 text-sm font-medium w-full">
            <ul class="list-disc pl-5">
                <li>All files should be in <span class="font-semibold">PDF</span> format.</li>
                <li>Maximum file size should not exceed <span class="font-semibold">2MB</span> per file.</li>
                <li>The first three documents are <span class="font-semibold">mandatory</span> to upload.</li>
            </ul>
        </div>
        <form action="{{ route('vendor.storeDocument') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-6">
                    <label for="certificate_of_incorporation" class="block text-sm font-semibold text-gray-700 mb-2">Certificate of Incorporation</label>
                    <input type="file" id="certificate_of_incorporation" name="certificate_of_incorporation"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition bg-white">
                </div>
                <div class="col-span-12 md:col-span-6">
                    <label for="tin_certificate" class="block text-sm font-semibold text-gray-700 mb-2">TIN Certificate</label>
                    <input type="file" id="tin_certificate" name="tin_certificate"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition bg-white">
                </div>
                <div class="col-span-12 md:col-span-6">
                    <label for="company_profile" class="block text-sm font-semibold text-gray-700 mb-2">Company Profile</label>
                    <input type="file" id="company_profile" name="company_profile"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition bg-white">
                </div>
                <div class="col-span-12 md:col-span-6">
                    <label for="past_project_evidence" class="block text-sm font-semibold text-gray-700 mb-2">Past Project Evidence</label>
                    <input type="file" id="past_project_evidence" name="past_project_evidence"  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition bg-white">
                </div>
                <div class="col-span-12">
                    <label for="other_document" class="block text-sm font-semibold text-gray-700 mb-2">Other Document</label>
                    <input type="file" id="other_document" name="other_document" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-green-400 transition bg-white">
                </div>
            </div>
            <div class="pt-4 flex justify-center">
                <button type="submit" class="w-full md:w-auto col-span-12 md:col-span-5 py-3 px-6 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-lg transition-all duration-200">Submit Documents</button>
            </div>
        </form>
    </div>
</div>
@endsection 