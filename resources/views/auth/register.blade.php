@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="mx-auto w-full max-w-4xl">
    <div class="p-6">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-gray-900">
                Register
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Register to create an account.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}"
              class="rounded-lg bg-white px-8 pt-6 pb-8 shadow-md">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    {{ __('Name') }}
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    autocomplete="name"
                    class="block w-full rounded-md border px-3 py-2 text-sm text-gray-900 shadow-sm
                        placeholder-gray-500 focus:outline-none focus:ring-2
                        @error('name')
                            border-red-500 focus:ring-red-200
                        @else
                            border-gray-300 focus:border-indigo-500 focus:ring-indigo-200
                        @enderror
                    "
                />

                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    {{ __('E-Mail Address') }}
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
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
            <div class="mb-4">
                <label for="password"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    {{ __('Password') }}
                </label>

                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
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

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password-confirm"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    {{ __('Confirm Password') }}
                </label>

                <input
                    id="password-confirm"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    class="block w-full rounded-md border px-3 py-2 text-sm text-gray-900 shadow-sm
                        placeholder-gray-500 focus:outline-none focus:ring-2
                        border-gray-300 focus:border-indigo-500 focus:ring-indigo-200
                    "
                />
            </div>

            <!-- Submit -->
            <div class="mb-4">
                <button
                    type="submit"
                    class="w-full rounded-md bg-pink-500 px-4 py-2 text-sm font-semibold text-white
                           shadow-sm hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-200">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
