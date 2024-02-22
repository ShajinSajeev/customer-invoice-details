@extends('layouts.app')
@section('contents')
    <main class="px-7 flex-col flex gap-7 py-3">
        <form action="{{ route('data.store', 'customer') }}" method="POST">
            @csrf
            <div class="w-full h-full bg-white px-14 pb-20 mt-2 pt-7 rounded-lg">
                <div class="flex py-2 justify-between">
                    <h5 class="text-xl font-semibold">Create new customer</h5>
                </div>
                <div class="grid w-full grid-cols-1 mt-10 gap-7">
                    <div class="flex gap-2 flex-col">
                        <label class="w-48" for="name">Customer Name</label>
                        <input type="text" name="name" id="name"
                            class="h-12 rounded border border-zinc-500 w-full" required>
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="w-48" for="phone">Customer Phone</label>
                        <input type="text" name="phone" id="phone"
                            class="h-12 rounded border border-zinc-500 w-full">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="w-48" for="email">Customer Email</label>
                        <input type="email" name="email" id="email"
                            class="h-12 rounded border border-zinc-500 w-full">
                    </div>
                    <div class="flex gap-2 flex-col">
                        <label class="w-48" for="address">Customer Address</label>
                        <textarea name="address" id="address" class="h-20 rounded border border-zinc-500 w-full"></textarea>
                    </div>
                    <div class="flex mt-5 justify-end">
                        <button type="submit"
                            class="bg-blue-500 text-white font-semibold px-5 w-fit px-7 rounded py-2.5">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
