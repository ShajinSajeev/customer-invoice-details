<div class="grid w-full grid-cols-1 mt-10 gap-7">
    <div class="flex gap-2 flex-col">
        <label class="w-48" for="name">Customer Name</label>
        <input type="text" name="name" id="name" class="h-12 rounded border border-zinc-500 w-full"  value="{{ $data->name }}" required>
        <input type="hidden" name="id" value="{{ $data->id }}">
    </div>
    <div class="flex gap-2 flex-col">
        <label class="w-48"  for="phone">Customer Phone</label>
        <input type="text" name="phone" id="phone" class="h-12 rounded border border-zinc-500 w-full" value="{{ $data->phone }}" >
    </div>
    <div class="flex gap-2 flex-col">
        <label class="w-48" for="email">Customer Email</label>
        <input type="email" name="email" id="email" class="h-12 rounded border border-zinc-500 w-full" value="{{ $data->email }}" >
    </div>
    <div class="flex gap-2 flex-col">
        <label class="w-48" for="address">Customer Address</label>
        <textarea name="address" id="address" class="h-20 rounded border border-zinc-500 w-full">{{ $data->address }}</textarea>
    </div>
    <div class="flex mt-5 justify-end">
        <button type="submit" class="bg-blue-500 text-white font-semibold px-5 w-fit px-7 rounded py-2.5">Update</button>
    </div>
</div>