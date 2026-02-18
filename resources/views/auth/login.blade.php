@extends('layouts.app')

@section('title', 'Log In')

@section('content')

<div class="mx-auto w-full max-w-4xl">
    <div class="p-6">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-900">
                GST Billing Software
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Enter your email address and password to access admin panel.
            </p>
        </div>

        <form method="POST" action="{{ route('login') }}"
              class="rounded-lg bg-white px-8 pt-6 pb-8 shadow-md">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="emailaddress"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Email address
                </label>

                <input
                    type="email"
                    id="emailaddress"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    placeholder="Enter your email"
                    class="block w-full rounded-md border px-3 py-2 text-sm text-gray-900 shadow-sm
                        placeholder-gray-500 focus:outline-none focus:ring-2
                        @error('email')
                            border-red-500 focus:ring-red-200
                        @else
                            border-gray-300 focus:border-indigo-500 focus:ring-indigo-200
                        @enderror
                    "
                />

                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter your password"
                    class="block w-full rounded-md border px-3 py-2 text-sm text-gray-900 shadow-sm
                        placeholder-gray-500 focus:outline-none focus:ring-2
                        @error('password')
                            border-red-500 focus:ring-red-200
                        @else
                            border-gray-300 focus:border-indigo-500 focus:ring-indigo-200
                        @enderror
                    "
                />

                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button -->
            <div class="mb-4">
                <button
                    type="submit"
                    class="w-full rounded-md bg-pink-500 px-4 py-2 text-sm font-semibold text-white
                           shadow-sm hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-200">
                    Log In
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
