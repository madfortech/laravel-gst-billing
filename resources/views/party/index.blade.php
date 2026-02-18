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
                Manage Parties
            </h2>

            <a href="{{ route('add-party') }}"
               class="inline-flex items-center gap-2 rounded-md bg-indigo-600 px-4 py-2
                      text-sm font-semibold text-white shadow-sm hover:bg-indigo-700
                      focus:outline-none focus:ring-2 focus:ring-indigo-200">
                + Add Party
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
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">S.No.</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Client Info</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Bank A/c</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Created At</th>
                            <th class="border-b px-4 py-3 text-left font-semibold text-gray-700">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @if(count($parties))
                            @foreach($parties as $index => $party)
                                <?php $party_id = base64_encode($party->id) ?>

                                <tr class="hover:bg-gray-50">

                                    <!-- S.No -->
                                    <td class="px-4 py-3 text-gray-900">
                                        {{ $index + 1 }}
                                    </td>

                                    <!-- Client Info -->
                                    <td class="px-4 py-3 text-gray-700">
                                        <ul class="space-y-1">
                                            <li><span class="font-semibold">Name:</span> {{ $party->full_name }}</li>
                                            <li><span class="font-semibold">Phone:</span> {{ $party->phone_no }}</li>
                                            <li>
                                                <span class="inline-flex rounded-full px-2 py-0.5 text-xs font-semibold
                                                    @if($party->party_type == 'vendor')
                                                        bg-blue-100 text-blue-700
                                                    @elseif($party->party_type == 'employee')
                                                        bg-sky-100 text-sky-700
                                                    @else
                                                        bg-red-100 text-red-700
                                                    @endif
                                                ">
                                                    {{ ucwords($party->party_type) }}
                                                </span>
                                            </li>
                                        </ul>
                                    </td>

                                    <!-- Bank Info -->
                                    <td class="px-4 py-3 text-gray-700">
                                        <ul class="space-y-1">
                                            <li><span class="font-semibold">Holder:</span> {{ $party->account_holder_name }}</li>
                                            <li><span class="font-semibold">Acc No:</span> {{ $party->account_no }}</li>
                                            <li><span class="font-semibold">Bank:</span> {{ $party->bank_name }}</li>
                                            <li><span class="font-semibold">IFSC:</span> {{ $party->ifsc_code }}</li>
                                        </ul>
                                    </td>

                                    <!-- Created At -->
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ date('d-m-Y', strtotime($party->created_at)) }}
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-4 py-3">
                                        <div class="relative inline-block text-left">
                                            <details class="group">
                                                <summary
                                                    class="cursor-pointer rounded-md border border-gray-300 bg-white px-3 py-1.5
                                                           text-sm text-gray-700 shadow-sm hover:bg-gray-50">
                                                    Actions
                                                </summary>

                                                <div
                                                    class="absolute right-0 z-10 mt-2 w-40 rounded-md bg-white shadow-lg ring-1 ring-black/5">
                                                    <div class="py-1 text-sm">

                                                        @if($party->party_type == 'vendor')
                                                            <a target="_blank"
                                                               href="{{ url('vendor-invoice/create/'.$party_id) }}"
                                                               class="block px-4 py-2 hover:bg-gray-100">
                                                                Create Invoice
                                                            </a>
                                                        @endif

                                                        <a href="{{ route('edit-party', $party->id) }}"
                                                           class="block px-4 py-2 hover:bg-gray-100">
                                                            Edit
                                                        </a>

                                                        <form method="POST"
                                                              action="{{ route('delete-party', $party) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </details>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>

@endsection
