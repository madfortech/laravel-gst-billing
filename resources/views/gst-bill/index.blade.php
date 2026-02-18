@extends('layouts.app')

@section('content')

<div class="flex min-h-screen bg-gray-50">

    <!-- Sidebar -->
    <aside class="w-64 shrink-0">
        @include('include.sidebar')
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">

        <!-- Page Title + Action -->
        <div class="mb-6 flex items-center justify-between">
            <h2 class="text-xl font-bold uppercase text-gray-900">
                Manage Bills
            </h2>

            <a href="{{ route('add-gst-bill') }}"
               class="inline-flex items-center gap-2 rounded-md bg-indigo-600 px-4 py-2
                      text-sm font-semibold text-white shadow-sm hover:bg-indigo-700
                      focus:outline-none focus:ring-2 focus:ring-indigo-200">
                Create New Bill
            </a>
        </div>

        <!-- Alerts -->
        @include('include.alert')

        <!-- Table Card -->
        <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

            <div class="overflow-x-auto">
                <table class="min-w-full border-collapse text-sm">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Sr No</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Invoice No</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Client's Info</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Billing Info</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Invoice Date</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        <?php $i = 1 ?>
                        @foreach($bills as $bill)
                            <tr class="hover:bg-gray-50">

                                <!-- Sr No -->
                                <td class="px-4 py-3 text-gray-900">
                                    {{ $i++ }}
                                </td>

                                <!-- Invoice No -->
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    #{{ $bill->invoice_no }}
                                </td>

                                <!-- Client Info -->
                                <td class="px-4 py-3 text-gray-700">
                                    <ul class="space-y-1">
                                        <li><span class="font-semibold">Name:</span> {{ $bill->party->full_name }}</li>
                                        <li><span class="font-semibold">Phone:</span> {{ $bill->party->phone_no }}</li>
                                    </ul>
                                </td>

                                <!-- Billing Info -->
                                <td class="px-4 py-3 text-gray-700">
                                    <ul class="space-y-1">
                                        <li><span class="font-semibold">Total:</span> ₹{{ $bill->total_amount }}</li>
                                        <li><span class="font-semibold">Tax:</span> ₹{{ $bill->tax_amount }}</li>
                                        <li><span class="font-semibold">Net:</span> ₹{{ $bill->net_amount }}</li>
                                    </ul>
                                </td>

                                <!-- Invoice Date -->
                                <td class="px-4 py-3 text-gray-700">
                                    {{ date('d-m-Y', strtotime($bill->invoice_date)) }}
                                </td>

                                <!-- Action -->
                                <td class="px-4 py-3">
                                    <div class="relative inline-block text-left">
                                        <details>
                                            <summary
                                                class="cursor-pointer rounded-md border border-gray-300 bg-white px-3 py-1.5
                                                       text-sm text-gray-700 shadow-sm hover:bg-gray-50">
                                                Actions
                                            </summary>

                                            <div
                                                class="absolute right-0 z-10 mt-2 w-44 rounded-md bg-white
                                                       shadow-lg ring-1 ring-black/5">
                                                <div class="py-1 text-sm">

                                                    <a href="{{ route('delete', ['gst_bills', $bill->id]) }}"
                                                       class="block px-4 py-2 hover:bg-gray-100">
                                                        Delete
                                                    </a>

                                                    <a href="{{ route('print-gst-bill', $bill->id) }}"
                                                       class="block px-4 py-2 hover:bg-gray-100">
                                                        Print
                                                    </a>

                                                    <a href="{{ route('print-gst-bill', [$bill->id, 'usd']) }}"
                                                       class="block px-4 py-2 hover:bg-gray-100">
                                                        Print USD Bill
                                                    </a>

                                                </div>
                                            </div>
                                        </details>
                                    </div>
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
