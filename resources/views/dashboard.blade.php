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
            <h4 class="text-xl font-bold text-gray-900 uppercase">
                Dashboard
            </h4>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">

            <!-- Total Parties -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-50 text-indigo-600 ring-1 ring-indigo-200">
                        👥
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $parties }}</h3>
                        <p class="text-sm text-gray-500">Total Parties</p>
                    </div>
                </div>
            </div>

            <!-- Vendor Invoices -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-green-50 text-green-600 ring-1 ring-green-200">
                        📄
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $invoices }}</h3>
                        <p class="text-sm text-gray-500">Vendor Invoices</p>
                    </div>
                </div>
            </div>

            <!-- GST Bills -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-sky-50 text-sky-600 ring-1 ring-sky-200">
                        🧾
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $bills }}</h3>
                        <p class="text-sm text-gray-500">GST Bills</p>
                    </div>
                </div>
            </div>

            <!-- Payments -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-full bg-yellow-50 text-yellow-600 ring-1 ring-yellow-200">
                        💰
                    </div>
                    <div class="text-right">
                        <h3 class="text-2xl font-bold text-gray-900">{{ number_format($payments) }}</h3>
                        <p class="text-sm text-gray-500">Payments</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

@endsection
