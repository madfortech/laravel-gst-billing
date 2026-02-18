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
                Edit Party
            </h4>
        </div>

        <!-- Card -->
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

            <!-- Alerts -->
            @include('include.alert')

            <!-- Basic Info -->
            <h4 class="mb-2 text-sm font-bold uppercase text-gray-700">
                Basic Info
            </h4>
            <hr class="mb-6">

            <form method="POST" action="{{ route('update-party', $party->id) }}">
                @csrf
                @method('PUT')

                <!-- Row 1 -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                    <!-- Type -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Type
                        </label>
                        <select
                            name="party_type"
                            required
                            class="block w-full rounded-md border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                            <option value="">Please select</option>
                            <option value="client" @if($party->party_type == 'client') selected @endif>Client</option>
                            <option value="vendor" @if($party->party_type == 'vendor') selected @endif>Vendor</option>
                            <option value="employee" @if($party->party_type == 'employee') selected @endif>Employee</option>
                        </select>
                    </div>

                    <!-- Full Name -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Full Name
                        </label>
                        <input
                            type="text"
                            name="full_name"
                            required
                            value="{{ $party->full_name }}"
                            placeholder="Enter client's full name"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Phone / Mobile Number
                        </label>
                        <input
                            type="text"
                            name="phone_no"
                            value="{{ $party->phone_no }}"
                            placeholder="Enter phone/mobile number"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                </div>

                <!-- Address -->
                <div class="mt-6">
                    <label class="mb-2 block text-sm font-semibold text-gray-700">
                        Address
                    </label>
                    <input
                        type="text"
                        name="address"
                        value="{{ $party->address }}"
                        placeholder="Enter Address"
                        class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                               focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                </div>

                <!-- Bank Details -->
                <h4 class="mt-10 mb-2 text-sm font-bold uppercase text-gray-700">
                    Bank Details
                </h4>
                <hr class="mb-6">

                <!-- Bank Row 1 -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Account Holder Name
                        </label>
                        <input
                            type="text"
                            name="account_holder_name"
                            value="{{ $party->account_holder_name }}"
                            placeholder="Enter Account Holder name"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Account Number
                        </label>
                        <input
                            type="text"
                            name="account_no"
                            value="{{ $party->account_no }}"
                            placeholder="Enter Account Number"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Bank Name
                        </label>
                        <input
                            type="text"
                            name="bank_name"
                            value="{{ $party->bank_name }}"
                            placeholder="Enter Bank Name"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                </div>

                <!-- Bank Row 2 -->
                <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-3">

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            IFSC Code
                        </label>
                        <input
                            type="text"
                            name="ifsc_code"
                            value="{{ $party->ifsc_code }}"
                            placeholder="Enter IFSC Code"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-2 block text-sm font-semibold text-gray-700">
                            Branch Address
                        </label>
                        <input
                            type="text"
                            name="branch_address"
                            value="{{ $party->branch_address }}"
                            placeholder="Enter Branch Address"
                            class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900
                                   focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-8 flex gap-4">
                    <button
                        type="submit"
                        class="rounded-md bg-indigo-600 px-6 py-2 text-sm font-semibold text-white
                               shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        Update
                    </button>

                    <a href="{{ route('manage-parties') }}"
                       class="rounded-md bg-gray-200 px-6 py-2 text-sm font-semibold text-gray-700
                              hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </main>
</div>

@endsection
