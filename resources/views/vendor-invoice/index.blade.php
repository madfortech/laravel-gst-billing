@extends('layouts.app')

@section('content')

<div class="flex min-h-screen bg-gray-50">

    <!-- Sidebar -->
    <aside class="hidden w-64 shrink-0 lg:block">
        @include('include.sidebar')
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">

        <!-- Page Title -->
        <div class="mb-6">
            <h2 class="text-xl font-bold uppercase text-gray-900">
                Manage Vendor Invoices
            </h2>
        </div>

        <!-- Alerts -->
        @include('include.alert')

        <!-- Table Card -->
        <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

            <!-- Card Header -->
            <div class="border-b px-6 py-4">
                <h4 class="text-sm font-bold uppercase text-gray-700">
                    All Invoices
                </h4>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">
                                Sr No
                            </th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">
                                Invoice No
                            </th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">
                                Client Info
                            </th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">
                                Amount
                            </th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">
                                Invoice Date
                            </th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @php $i = 1; @endphp

                        @foreach($invoices as $invoice)
                            <tr class="hover:bg-gray-50">

                                <!-- Sr No -->
                                <td class="px-4 py-3 text-gray-900">
                                    {{ $i++ }}
                                </td>

                                <!-- Invoice No -->
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    #{{ $invoice->invoice_no }}
                                </td>

                                <!-- Client Info -->
                                <td class="px-4 py-3 text-gray-700">
                                    <div class="space-y-1">
                                        <div>
                                            <span class="font-semibold">Name:</span>
                                            {{ $invoice->full_name }}
                                        </div>
                                        <div>
                                            <span class="font-semibold">Phone:</span>
                                            {{ $invoice->phone_no }}
                                        </div>
                                    </div>
                                </td>

                                <!-- Amount -->
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    ₹{{ $invoice->total_amount }}
                                </td>

                                <!-- Date -->
                                <td class="px-4 py-3 text-gray-700">
                                    {{ date('d-m-Y', strtotime($invoice->invoice_date)) }}
                                </td>

                                <!-- Action -->
                                <td class="px-4 py-3">
                                    <a
                                        target="_blank"
                                        href="{{ route('vendor-invoice.show', [base64_encode($invoice->id)]) }}"
                                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-1.5
                                               text-xs font-semibold text-white shadow-sm
                                               hover:bg-indigo-700 focus:outline-none
                                               focus:ring-2 focus:ring-indigo-200">
                                        Print
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>

@endsection
