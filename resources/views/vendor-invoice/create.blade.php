@extends('layouts.app')

@section('content')

<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <!-- Page Title -->
    <div class="mb-6">
        <h4 class="text-xl font-bold uppercase text-gray-900">
            Create Invoice
        </h4>
    </div>

    @if(!is_null($party))

        <!-- Alerts -->
        @include('include.alert')

        <!-- Card -->
        <div class="rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

            <form method="POST" action="{{ route('vendor-invoice.store') }}">
                @csrf

                <div class="p-6">
                    <input type="hidden" name="party_id" value="{{ $party->id }}">

                    <!-- Your Details -->
                    <h4 class="text-sm font-bold uppercase text-gray-700 mb-2">
                        Your Details
                    </h4>
                    <hr class="mb-4">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Name</label>
                            <input type="text" readonly value="{{ $party->full_name }}"
                                   name="full_name"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Phone Number</label>
                            <input type="text" readonly value="{{ $party->phone_no }}"
                                   name="phone_no"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Address</label>
                            <input type="text" readonly value="{{ $party->address }}"
                                   name="address"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>
                    </div>

                    <!-- Invoice Info -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Invoice Number *</label>
                            <input type="text" readonly required
                                   name="invoice_no"
                                   value="{{ $invoice_no }}"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Invoice Date *</label>
                            <input type="date" required
                                   name="invoice_date"
                                   value="{{ date('Y-m-d') }}"
                                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm">
                        </div>
                    </div>

                    <!-- Bank Details -->
                    <h4 class="text-sm font-bold uppercase text-gray-700 mb-2">
                        Your Bank Detail
                    </h4>
                    <hr class="mb-4">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Account Holder Name</label>
                            <input type="text" readonly value="{{ $party->account_holder_name }}"
                                   name="account_holder_name"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Account Number</label>
                            <input type="text" readonly value="{{ $party->account_no }}"
                                   name="account_no"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Bank Name</label>
                            <input type="text" readonly value="{{ $party->bank_name }}"
                                   name="bank_name"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-6">
                        <div class="md:col-span-3">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">IFSC Code</label>
                            <input type="text" readonly value="{{ $party->ifsc_code }}"
                                   name="ifsc_code"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>

                        <div class="md:col-span-9">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Branch Address</label>
                            <input type="text" readonly value="{{ $party->branch_address }}"
                                   name="branch_address"
                                   class="w-full rounded-md border border-gray-300 bg-gray-100 px-3 py-2 text-sm">
                        </div>
                    </div>

                    <!-- Item Details -->
                    <h4 class="text-sm font-bold uppercase text-gray-700 mb-2">
                        Enter Product / Item Detail
                    </h4>
                    <hr class="mb-4">

                    <div class="grid grid-cols-12 text-sm font-semibold">
                        <div class="col-span-8 border px-3 py-2">DESCRIPTIONS</div>
                        <div class="col-span-4 border px-3 py-2">TOTAL AMOUNT</div>
                    </div>

                    <div class="grid grid-cols-12 mb-4">
                        <div class="col-span-8 border p-2">
                            <textarea name="item_description" rows="5"
                                      placeholder="Enter work details (hit enter for new line)"
                                      class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm">{{ old('item_description') }}</textarea>
                        </div>

                        <div class="col-span-4 border p-2">
                            <input type="text"
                                   name="total_amount"
                                   id="totalInput"
                                   value="{{ old('total_amount') }}"
                                   oninput="calculateTotalAmount()"
                                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm">
                        </div>
                    </div>

                    <div class="flex justify-end text-sm mb-6">
                        <b>Total Amount:</b>&nbsp;₹ <span id="totalDisplay">0</span>
                    </div>

                    <input type="hidden" name="declaration">

                    <!-- Submit -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="rounded-md bg-green-600 px-6 py-2 text-sm font-semibold text-white
                                       hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-200">
                            Submit →
                        </button>
                    </div>

                </div>
            </form>
        </div>

    @else
        <div class="rounded-md bg-red-100 p-4 text-sm text-red-700">
            Party not found!
        </div>
    @endif

</div>

@endsection
