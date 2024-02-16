@extends('layouts.app')
@section('contents')
<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=number] {
    -moz-appearance: textfield;
}
</style>
    <main class="px-7 flex-col flex gap-7 py-3">
        <form  action="{{ route('invoice.store')}}" method="POST">
            @csrf
            
            <div class="w-full h-full bg-white px-14 pb-20 mt-2 pt-7 rounded-lg">
                <div class="flex py-2 justify-between">
                    <h5 class="text-xl font-semibold">Create new invoice</h5>
                </div>
                    <div class="grid w-full grid-cols-1 mt-10 gap-7">
                        <div class="flex gap-2 flex-col">
                            <label class="w-48" for="name">Customer Name</label>
                            <select name="name" id="name" required>
                                <option value="">-- Select Customer --</option>
                                @foreach($customerList as $customer)
                                <option value="{{ $customer->id}}">{{ $customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex gap-2 flex-col">
                            <label class="w-48"  for="date">Date</label>
                            <input type="date" name="date" id="date" class="h-12 rounded border border-zinc-500 w-full">
                        </div>
                        <div class="flex gap-2 flex-col">
                            <label class="w-48" for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" class="h-12 rounded border border-zinc-500 w-full no-spinners">
                        </div>
                        <div class="flex gap-2 flex-col">
                            <label class="w-48" for="status">Status</label>
                            <select name="status" id="status">
                                <option value="">-- Select status --</option>
                                <option value="0">Unpaid</option>
                                <option value="1">Paid</option>
                                <option value="2">Cancelled</option>
                            </select>
                        </div>
                        <div class="flex mt-5 justify-end">
                            <button type="submit" class="bg-blue-500 text-white font-semibold px-5 w-fit px-7 rounded py-2.5">Submit</button>
                        </div>
                    </div>
            </div>
        </form>
    </main>
@endsection
