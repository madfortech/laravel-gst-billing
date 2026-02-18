@extends('layouts.app')

@section('content')

<div class="flex min-h-screen bg-gray-50">

    <!-- Sidebar -->
    <aside class="w-64 shrink-0">
        @include('include.sidebar')
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">

        <!-- Page Title -->
        <div class="mb-6">
            <h4 class="text-xl font-bold uppercase text-gray-900">
                Create GST Bill
            </h4>
        </div>

        <!-- Card -->
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

            <!-- Alerts -->
            @include('include.alert')

            <!-- Invoice Basic Info -->
            <h4 class="mb-2 text-sm font-bold uppercase text-gray-700">
                Invoice Basic Info
            </h4>
            <hr class="mb-6">

            <form action="{{ route('create-gst-bill') }}" method="post">
                @csrf

                <!-- Row 1 -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                    <!-- Party -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Party</label>
                        <select
                            required
                            name="party_id"
                            class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                            <option value="">Please select</option>
                            @foreach($parties as $party)
                                <option value="{{ $party->id }}">{{ $party->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Invoice Date -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Invoice Date</label>
                        <input
                            type="date"
                            required
                            name="invoice_date"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <!-- Invoice Number -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">Invoice Number</label>
                        <input
                            type="text"
                            required
                            name="invoice_no"
                            value="{{ $invoice_no }}"
                            placeholder="Enter Invoice number"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>
                </div>

                <!-- Item Details -->
                <h4 class="mt-10 mb-2 text-sm font-bold uppercase text-gray-700">
                    Item Details
                </h4>
                <hr class="mb-4">

                <!-- Header -->
                <div class="grid grid-cols-1 md:grid-cols-12 text-sm font-semibold text-gray-700">
                    <div class="md:col-span-6 border px-3 py-2 text-center">DESCRIPTIONS</div>
                    <div class="md:col-span-3 border px-3 py-2 text-center">TOTAL AMOUNT</div>
                    <div class="md:col-span-3 border px-3 py-2 text-center">TOTAL AMOUNT (USD)</div>
                </div>

                <!-- Row -->
                <div class="mb-4 grid grid-cols-1 md:grid-cols-12">
                    <div class="md:col-span-6 border p-2">
                        <input
                            required
                            name="item_description"
                            placeholder="Enter description"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <div class="md:col-span-3 border p-2">
                        <input
                            required
                            type="text"
                            name="total_amount"
                            id="totalAmountInput"
                            placeholder="Enter INR amount"
                            oninput="calculateNetAmount()"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <div class="md:col-span-3 border p-2">
                        <input
                            type="text"
                            name="total_amount_usd"
                            placeholder="Enter USD amount"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>
                </div>

                <!-- GST -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-12">

                    <div class="md:col-span-3">
                        <label class="mb-2 block text-sm font-semibold text-gray-700">CGST (%)</label>
                        <input type="text" name="cgst_rate" id="cgst" oninput="calculateNetAmount()"
                               class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                      focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        <span class="text-xs text-right block" id="cgstDisplay">0</span>
                        <input type="hidden" name="cgst_amount" id="cgstAmount" value="0">
                    </div>

                    <div class="md:col-span-3">
                        <label class="mb-2 block text-sm font-semibold text-gray-700">SGST (%)</label>
                        <input type="text" name="sgst_rate" id="sgst" oninput="calculateNetAmount()"
                               class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                      focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        <span class="text-xs text-right block" id="sgstDisplay">0</span>
                        <input type="hidden" name="sgst_amount" id="sgstAmount" value="0">
                    </div>

                    <div class="md:col-span-3">
                        <label class="mb-2 block text-sm font-semibold text-gray-700">IGST (%)</label>
                        <input type="text" name="igst_rate" id="igst" oninput="calculateNetAmount()"
                               class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                      focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        <span class="text-xs text-right block" id="igstDisplay">0</span>
                        <input type="hidden" name="igst_amount" id="igstAmount" value="0">
                    </div>

                    <div class="md:col-span-3 flex items-end justify-end">
                        <ul class="text-sm space-y-1">
                            <li><b>Total:</b> ₹ <span id="totalAmountDisplay">0</span></li>
                            <li><b>Tax:</b> ₹ <span id="taxDisplay">0</span></li>
                            <li><b>Net:</b> ₹ <span id="netAmountDisplay">0</span></li>
                        </ul>
                        <input type="hidden" name="tax_amount" id="taxAmount">
                        <input type="hidden" name="net_amount" id="netAmount">
                    </div>
                </div>

                <!-- Declaration -->
                <div class="mt-6">
                    <input type="text" name="declaration" placeholder="Declaration"
                           class="mb-4 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                                  focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">

                    <button type="submit"
                            class="float-right rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white
                                   hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </main>
</div>

@endsection
