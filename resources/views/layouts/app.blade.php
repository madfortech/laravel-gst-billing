<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @vite(['resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body class="">
    <div class="">
        <header class=" ">
            <div class=" ">
                <div class=" ">
                    <a class="text-sm font-semibold text-gray-900" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <nav class="flex items-center gap-3">
                        @guest
                            <a class="text-sm text-gray-700 hover:text-gray-900" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="text-sm text-gray-700 hover:text-gray-900" href="{{ route('register') }}">Register</a>
                            @endif
                        @else
                            <span class="text-sm text-gray-700">{{ Auth::user()->name }}</span>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">
                                    Logout
                                </button>
                            </form>
                        @endguest
                    </nav>
                </div>
            </div>
        </header>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('public/assets/script.js') }}"></script>
</body>

</html>