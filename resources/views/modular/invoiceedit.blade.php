<div class="grid grid-cols-1 mt-10 gap-7">
    <div class="flex gap-2 flex-col">
        <label class="w-48" for="name">Customer Name</label>
        <select name="customer" id="customer" required class="h-12 rounded border border-zinc-500 w-full">
            <option value="">-- Select Customer --</option>
            @foreach($customerList as $customer)
                <option value="{{ $customer->id}}" {{ $data->customer == $customer->id ? 'selected' : '' }}>{{ $customer->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="flex gap-2 flex-col">
        <label class="w-48" for="date">Date</label>
        <input type="date" name="date" id="date" class="h-12 rounded border border-zinc-500 w-full" value="{{$data->date}}">
        <input type="hidden" name="id" value="{{ $data->id }}">
    </div>

    <div class="flex gap-2 flex-col">
        <label class="w-48" for="amount">Amount</label>
        <input type="number" name="amount" id="amount" class="h-12 rounded border border-zinc-500 w-full no-spinners" value="{{ $data->amount }}">
    </div>

    <div class="flex gap-2 flex-col">
        <label class="w-48" for="status">Status</label>
        <select name="status" id="status" class="h-12 rounded border border-zinc-500 w-full">
            <option value="">-- Select status --</option>
            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>Unpaid</option>
            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>Paid</option>
            <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>

    <div class="flex mt-5 justify-end">
        <button type="submit" class="bg-blue-500 text-white font-semibold px-5 w-fit px-7 rounded py-2.5">Update</button>
    </div>
</div>