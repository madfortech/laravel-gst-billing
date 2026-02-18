@extends('layout.app')

@section('content')

<div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

    @if($bill)

    <!-- Invoice Card -->
    <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 print:shadow-none print:ring-0">

        <!-- Company Info -->
        <div class="text-center mb-4">
            <h1 class="text-2xl font-bold uppercase text-gray-900">
                {{ $company->name }}
            </h1>

            <div class="mt-2 text-sm text-gray-700">
                <div>{!! $company->address !!}</div>

                <div class="mt-1">
                    @if($company->email)<span><b>Email:</b> {{ $company->email }} | </span>@endif
                    @if($company->website)<span><b>Web:</b> {{ $company->website }} | </span>@endif
                    @if($company->phone_number)<span><b>Mob:</b> +91 {{ $company->phone_number }}</span>@endif
                    @if($company->pan_number)<span> | <b>PAN:</b> {{ $company->pan_number }}</span>@endif
                    @if($company->gstin_number)<span> | <b>GSTIN:</b> {{ $company->gstin_number }}</span>@endif
                </div>
            </div>
        </div>

        <!-- GST INVOICE Title -->
        <div class="border text-center py-2 mb-4">
            <h3 class="text-lg font-bold uppercase">
                GST Invoice
            </h3>
        </div>

        <!-- Client + Invoice Details -->
        <div class="grid grid-cols-1 md:grid-cols-2 border mb-4">

            <!-- Client Info -->
            <div class="border-b md:border-b-0 md:border-r p-3">
                <h5 class="mb-2 border-b pb-1 text-center font-semibold">
                    Details of the Client | Billed To
                </h5>

                <div class="space-y-1 text-sm">
                    <div><b>Name:</b> {{ $bill->party->full_name }}</div>
                    <div><b>Phone:</b> {{ $bill->party->phone_no }}</div>
                    <div><b>Address:</b> {{ $bill->party->address }}</div>

                    <div class="flex justify-between">
                        <span><b>State:</b> {{ $bill->party->state }}</span>
                        <span><b>State Code:</b> {{ $bill->party->state_code }}</span>
                    </div>

                    <div><b>GSTIN:</b> {{ $bill->party->gstin }}</div>
                </div>
            </div>

            <!-- Invoice Info -->
            <div class="p-3">
                <h5 class="mb-2 border-b pb-1 text-center font-semibold">
                    Invoice Details
                </h5>

                <div class="space-y-1 text-sm">
                    <div><b>Invoice Number:</b> {{ $bill->invoice_no }}</div>
                    <div><b>Invoice Date:</b> {{ date('d F Y', strtotime($bill->invoice_date)) }}</div>
                </div>
            </div>

        </div>

        <!-- Items Table -->
        <div class="overflow-x-auto mb-4">
            <table class="table-auto w-full border-collapse border">
                <thead>
                    <tr class="bg-sky-300 text-black">
                        <th class="border px-3 py-2 text-left">DESCRIPTION</th>
                        <th class="border px-3 py-2 text-center w-40">AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border px-3 py-2 font-semibold">
                            {{ $bill->item_description }}
                        </td>
                        <td class="border px-3 py-2 text-center">
                            @if($currency == 'usd')
                                ${{ $bill->total_amount_usd }}
                            @else
                                ₹{{ $bill->total_amount }}
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Bank + Totals -->
        <div class="grid grid-cols-1 md:grid-cols-12 border">

            <!-- Bank Details -->
            <div class="md:col-span-9 p-3">
                <div class="rounded bg-gray-100 p-3 text-center">
                    <h5 class="font-semibold mb-1">Bank Details</h5>
                    <p class="text-sm font-medium">
                        {{ $company->bank_name }} – ACCOUNT NO: {{ $company->account_number }} –
                        IFSC: {{ $company->ifsc_code }}
                    </p>
                </div>
            </div>

            <!-- Amount Summary -->
            <div class="md:col-span-3 p-3">
                <ul class="space-y-1 text-sm">
                    @if($currency == 'usd')
                        <li class="flex justify-between">
                            <b>Net Amount:</b>
                            <span>${{ $bill->total_amount_usd }}</span>
                        </li>
                    @else
                        <li class="flex justify-between"><b>Total:</b><span>₹{{ $bill->total_amount }}</span></li>
                        <li class="flex justify-between"><b>CGST ({{ $bill->cgst_rate }}%):</b><span>₹{{ $bill->cgst_amount }}</span></li>
                        <li class="flex justify-between"><b>SGST ({{ $bill->sgst_rate }}%):</b><span>₹{{ $bill->sgst_amount }}</span></li>
                        <li class="flex justify-between"><b>IGST ({{ $bill->igst_rate }}%):</b><span>₹{{ $bill->igst_amount }}</span></li>
                        <li class="flex justify-between"><b>Total Tax:</b><span>₹{{ $bill->tax_amount }}</span></li>
                        <li class="flex justify-between font-semibold"><b>Net Amount:</b><span>₹{{ $bill->net_amount }}</span></li>
                    @endif
                </ul>
            </div>

        </div>

        <!-- Actions -->
        <div class="mt-6 flex justify-end gap-3 print:hidden">
            <button onclick="window.print()"
                    class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white
                           hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                Print
            </button>

            <a href="{{ route('manage-gst-bills') }}"
               class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white
                      hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-200">
                All Bills
            </a>
        </div>

    </div>

    @else
        <div class="rounded-md bg-red-100 p-4 text-sm text-red-700">
            Invoice not found
        </div>
    @endif

</div>

@endsection
