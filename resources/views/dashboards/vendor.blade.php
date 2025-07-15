@extends('layouts.vendor')
@section('content')
    <h2 class="text-2xl font-bold text-[#232323] mb-6">Welcome, vendor!</h2>
    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Tenders Card -->
        <div class="bg-gradient-to-tr from-green-100 to-green-300 shadow-lg rounded-xl p-6 flex items-center justify-between">
            <div>
                <div class="text-lg font-semibold text-green-900 mb-1">Total Tenders</div>
                <div class="text-3xl font-bold text-green-700">12</div>
            </div>
            <div class="bg-green-200 p-3 rounded-full">
                <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a4 4 0 014-4h4m0 0V7a4 4 0 00-4-4H7a4 4 0 00-4 4v10a4 4 0 004 4h4" /></svg>
            </div>
        </div>
        <!-- Total Bid Submission Card -->
        <div class="bg-gradient-to-tr from-blue-100 to-blue-300 shadow-lg rounded-xl p-6 flex items-center justify-between">
            <div>
                <div class="text-lg font-semibold text-blue-900 mb-1">Total Bid Submission</div>
                <div class="text-3xl font-bold text-blue-700">8</div>
            </div>
            <div class="bg-blue-200 p-3 rounded-full">
                <svg class="w-8 h-8 text-blue-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
        </div>
        <!-- Document Uploaded Card -->
        <div class="bg-gradient-to-tr from-purple-100 to-purple-300 shadow-lg rounded-xl p-6 flex items-center justify-between">
            <div>
                <div class="text-lg font-semibold text-purple-900 mb-1">Document Uploaded</div>
                <div class="text-3xl font-bold text-purple-700">21</div>
            </div>
            <div class="bg-purple-200 p-3 rounded-full">
                <svg class="w-8 h-8 text-purple-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
            </div>
        </div>
    </div>
    <!-- Payment History Table -->
    <div class="bg-white rounded-xl shadow-2xl p-6 mb-16">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-bold text-gray-800">Payment History</h3>
        </div>
        <div class="overflow-x-auto">
            <table id="paymentHistory" class="min-w-full divide-y divide-gray-200 rounded-xl overflow-hidden">
                <thead class="bg-gradient-to-r from-green-100 to-green-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Transaction ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Payment Type</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-green-900 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">TXN123456</td>
                        <td class="px-6 py-4 whitespace-nowrap">₦50,000</td>
                        <td class="px-6 py-4 whitespace-nowrap">Card</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">Success</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-06-01</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">TXN123457</td>
                        <td class="px-6 py-4 whitespace-nowrap">₦20,000</td>
                        <td class="px-6 py-4 whitespace-nowrap">Bank Transfer</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="inline-block px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-bold">Pending</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-06-02</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">TXN123458</td>
                        <td class="px-6 py-4 whitespace-nowrap">₦15,000</td>
                        <td class="px-6 py-4 whitespace-nowrap">Card</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="inline-block px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-bold">Failed</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-06-03</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">TXN123459</td>
                        <td class="px-6 py-4 whitespace-nowrap">₦10,000</td>
                        <td class="px-6 py-4 whitespace-nowrap">USSD</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">Success</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-06-04</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-semibold">TXN123460</td>
                        <td class="px-6 py-4 whitespace-nowrap">₦30,000</td>
                        <td class="px-6 py-4 whitespace-nowrap">Card</td>
                        <td class="px-6 py-4 whitespace-nowrap"><span class="inline-block px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold">Success</span></td>
                        <td class="px-6 py-4 whitespace-nowrap">2024-06-05</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Custom DataTable styles */
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 1rem;
        }
        table.dataTable {
            border-radius: 0.75rem;
            overflow: hidden;
        }
        table.dataTable thead th {
            background: linear-gradient(to right, #bbf7d0, #86efac);
            color: #166534;
            font-weight: 700;
            font-size: 0.85rem;
            border-bottom: 2px solid #bbf7d0;
        }
        table.dataTable tbody tr {
            transition: background 0.2s;
        }
        table.dataTable tbody tr:hover {
            background: #f0fdf4;
        }
        table.dataTable tbody td {
            font-size: 1rem;
            color: #232323;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 0.5rem;
            background: #f0fdf4;
            color: #16a34a !important;
            margin: 0 2px;
            border: none !important;
            transition: background 0.2s, color 0.2s;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #16a34a !important;
            color: #fff !important;
        }
        .dataTables_wrapper .dataTables_filter input {
            border-radius: 0.5rem;
            border: 1px solid #bbf7d0;
            padding: 0.5rem 1rem;
            margin-left: 0.5rem;
            outline: none;
            transition: border 0.2s;
        }
        .dataTables_wrapper .dataTables_filter input:focus {
            border: 1.5px solid #16a34a;
        }
        .dataTables_wrapper .dataTables_info {
            color: #166534;
            font-weight: 500;
            margin-top: 0.5rem;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('#paymentHistory').DataTable({
                responsive: true,
                language: {
                    search: "",
                    searchPlaceholder: "Search payments..."
                },
                pagingType: "simple_numbers",
                lengthChange: false,
                pageLength: 5,
                info: false,
                ordering: true,
                columnDefs: [
                    { orderable: false, targets: [3] }
                ]
            });
            // Style DataTables search box
            $("#paymentHistory_filter input").addClass("border border-gray-300 rounded-lg px-3 py-2 ml-2 focus:outline-none focus:ring-2 focus:ring-green-400");
        });
    </script>
@endsection