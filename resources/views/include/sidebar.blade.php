<!-- ========== Left Sidebar Start ========== -->
<aside class="w-64 min-h-screen bg-white shadow-sm ring-1 ring-gray-200">

    <div class="flex h-full flex-col p-4">

        <!-- Brand -->
        <div class="mb-6">
            <h1 class="text-lg font-bold text-indigo-600">
                GST Billing
            </h1>
            <p class="text-xs text-gray-500">
                Total Routes: <span class="font-semibold text-gray-700">36</span>
            </p>
        </div>

        <!-- Menu -->
        <nav class="flex-1">
            <ul class="space-y-2 text-sm font-medium">

                <!-- Dashboard -->
                <li>
                    <a href="{{ url('/') }}"
                       class="flex items-center gap-3 rounded-md px-3 py-2
                              {{ request()->is('/') ? 'bg-indigo-50 text-indigo-700' : 'text-gray-700 hover:bg-gray-100' }}">
                        <span>🏠</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Parties -->
                <li>
                    <details class="group">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-md px-3 py-2
                                   text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center gap-3">
                                <span>👥</span>
                                <span>Parties</span>
                            </div>
                            <span class="transition-transform group-open:rotate-90">›</span>
                        </summary>

                        <ul class="mt-1 space-y-1 pl-6">
                            <li>
                                <a href="{{ route('add-party') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    ➕ Add Party
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manage-parties') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    📋 Manage Parties
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- GST Billing -->
                <li>
                    <details class="group">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-md px-3 py-2
                                   text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center gap-3">
                                <span>🧾</span>
                                <span>GST Billing</span>
                            </div>
                            <span class="transition-transform group-open:rotate-90">›</span>
                        </summary>

                        <ul class="mt-1 space-y-1 pl-6">
                            <li>
                                <a href="{{ route('add-gst-bill') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    ➕ Create Bill
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('manage-gst-bills') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    📑 Manage Bills
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Vendor Invoices -->
                <li>
                    <details class="group">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-md px-3 py-2
                                   text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center gap-3">
                                <span>📦</span>
                                <span>Vendor Invoices</span>
                            </div>
                            <span class="transition-transform group-open:rotate-90">›</span>
                        </summary>

                        <ul class="mt-1 space-y-1 pl-6">
                            <li>
                                <a href="{{ route('vendor-invoice.index') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    📄 All Invoices
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('vendor-invoice.create') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    ➕ Create Invoice
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>

                <!-- Account -->
                <li>
                    <details class="group">
                        <summary
                            class="flex cursor-pointer items-center justify-between rounded-md px-3 py-2
                                   text-gray-700 hover:bg-gray-100">
                            <div class="flex items-center gap-3">
                                <span>⚙️</span>
                                <span>Account</span>
                            </div>
                            <span class="transition-transform group-open:rotate-90">›</span>
                        </summary>

                        <ul class="mt-1 space-y-1 pl-6">
                            <li>
                                <a href="{{ route('change-password') }}"
                                   class="block rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                    🔒 Change Password
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="w-full text-left rounded-md px-3 py-2 text-gray-600 hover:bg-gray-100">
                                        🚪 Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </details>
                </li>

            </ul>
        </nav>

        <!-- Footer -->
        <div class="pt-4 text-xs text-gray-400">
            © {{ date('Y') }} GST Billing
        </div>
    </div>
</aside>
<!-- Left Sidebar End -->
