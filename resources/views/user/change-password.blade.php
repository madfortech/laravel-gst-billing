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
            <h4 class="text-xl font-bold text-gray-900">
                Change Password
            </h4>
        </div>

        <!-- Alerts -->
        @include('include.alert')

        <!-- Card -->
        <div class="max-w-xl rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

            <h4 class="mb-4 text-sm font-bold uppercase text-gray-700">
                Fill the form
            </h4>

            <form action="{{ route('change-password-submit') }}" method="post" class="space-y-4">
                @csrf

                <!-- Current Password -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Current Password
                    </label>
                    <input
                        type="password"
                        name="current_pass"
                        required
                        class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                               text-gray-900 shadow-sm placeholder-gray-400
                               focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    />
                </div>

                <!-- New Password -->
                <div>
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        New Password
                    </label>
                    <input
                        type="password"
                        name="new_pass"
                        required
                        class="block w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                               text-gray-900 shadow-sm placeholder-gray-400
                               focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200"
                    />
                </div>

                <!-- Submit -->
                <div class="pt-4 text-right">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-md bg-indigo-600 px-5 py-2
                               text-sm font-semibold text-white shadow-sm
                               hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </main>
</div>

@endsection
