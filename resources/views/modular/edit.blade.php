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
        <form action="{{ route('data.update', $type) }}" method="POST">
            @csrf

            <div class="w-full h-full bg-white px-14 pb-20 mt-2 pt-7 rounded-lg">
                <div class="flex py-2 justify-between">
                    <h5 class="text-xl font-semibold">Edit {{ $type }}</h5>
                </div>
                @foreach ($labels as $key => $label)
                    <div class="flex gap-2 flex-col">
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <label class="w-48" for="name"> {{ ucfirst($type) }} {{ ucfirst($label->label) }} </label>
                        @if (optional($label->input)->name == 'text')
                            <input type="text" name="{{ $label->label }}"
                                class="h-12 rounded border border-zinc-500 w-full" value="{{ $data->{$label->label} }}"
                                @if ($type == 'customer') required @endif>
                        @elseif(optional($label->input)->name == 'number')
                            <input type="number" name="{{ $label->label }}" value="{{ $data->{$label->label} }}"
                                class="h-12 rounded border border-zinc-500 w-full">
                        @elseif(optional($label->input)->name == 'email')
                            <input type="email" name="{{ $label->label }}" value="{{ $data->{$label->label} }}"
                                class="h-12 rounded border border-zinc-500 w-full">
                        @elseif(optional($label->input)->name == 'select')
                            @if ($type == 'invoice')
                                @if ($label->label == 'name')
                                    <select name="customer" required>
                                        <option value="">-- Select Customer --</option>
                                        @foreach ($customerList as $customer)
                                            <option value="{{ $customer->id }}"
                                                {{ $data->customer == $customer->id ? 'selected' : '' }}>
                                                {{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                @elseif($label->label == 'status')
                                    <select name="status" id="status">
                                        <option value="">-- Select status --</option>
                                        <option value="unpaid" {{ $data->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        <option value="paid" {{ $data->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                        <option value="cancelled" {{ $data->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                        </option>
                                    </select>
                                @endif
                            @endif
                        @elseif(optional($label->input)->name == 'textarea')
                            <textarea name="{{ $label->label }}" class="h-20 rounded border border-zinc-500 w-full">{{ $data->{$label->label} }}</textarea>
                        @else
                            <input type="date" name="{{ $label->label }}" value="{{ $data->{$label->label} }}"
                                class="h-12 rounded border border-zinc-500 w-full">
                        @endif
                    </div>
                @endforeach
                <div class="flex mt-5 justify-end">
                    <button type="submit"
                        class="bg-blue-500 text-white font-semibold px-5 w-fit px-7 rounded py-2.5">Update</button>
                </div>
            </div>
        </form>
    </main>
@endsection
