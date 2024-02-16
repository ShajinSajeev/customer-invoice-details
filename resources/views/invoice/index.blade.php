@extends('layouts.app')
@section('contents')
    <main class="px-7 flex-col flex gap-7 py-3">
        <div class="flex border-b py-2 justify-between">
            <h5 class="text-xl font-semibold">Invoice Management</h5>
            <a href="{{ route('invoice.new') }}" class="bg-blue-500 text-white font-semibold px-3 rounded py-1.5">Add
                Invoice</a>
        </div>
        <div class="w-full overflow-hidden
        rounded-lg">
            <table class="table bg-white w-full">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2.5 text-left px-7">sl no</th>
                        <th class="py-2.5 text-left px-7">Customer</th>
                        <th class="py-2.5 text-left px-7">Date</th>
                        <th class="py-2.5 text-left px-7">Amount</th>
                        <th class="py-2.5 text-left px-7">Status</th>
                        <th class="py-2.5 text-left px-7">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoiceList as $invoice)
                        <tr>
                            <td class="py-2.5 text-left px-7">{{ $loop->iteration }}</td>
                            <td class="py-2.5 text-left px-7">{{ $invoice->customerName }}</td>
                            <td class="py-2.5 text-left px-7">{{ $invoice->date }}</td>
                            <td class="py-2.5 text-left px-7">₹ {{ $invoice->amount }}</td>
                            <td class="py-2.5 text-left px-7">
                                {{ $invoice->status == 0 ? 'Unpaid' : ($invoice->status == 1 ? 'Paid' : 'Cancelled') ?? '' }}
                            </td>                            
                            <td class="py-2.5 text-left px-7">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('invoice.edit',$invoice->id)}}"
                                        class="bg-orange-400 text-white font-semibold px-3 text-sm rounded py-1">Edit</button>
                                    <a href="{{ route('invoice.destroy',$invoice->id)}}"
                                        class="bg-red-500 text-white font-semibold px-3 text-sm rounded py-1">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
