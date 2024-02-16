@extends('layouts.app')
@section('contents')
    <main class="px-7 flex-col flex gap-7 py-3">
        <div class="flex border-b py-2 justify-between">
            <h5 class="text-xl font-semibold">Customers Management</h5>
            <a href="{{ route('customer.new') }}" class="bg-blue-500 text-white font-semibold px-3 rounded py-1.5">Add
                Customer</a>
        </div>
        <div class="w-full overflow-hidden
        rounded-lg">
            <table class="table bg-white w-full">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2.5 text-left px-7">sl no</th>
                        <th class="py-2.5 text-left px-7">Name</th>
                        <th class="py-2.5 text-left px-7">Email</th>
                        <th class="py-2.5 text-left px-7">Phone</th>
                        <th class="py-2.5 text-left px-7">Address</th>
                        <th class="py-2.5 text-left px-7">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($customerList as $customer)
                        <tr>
                            <td class="py-2.5 text-left px-7">{{ $loop->iteration }}</td>
                            <td class="py-2.5 text-left px-7">{{ $customer->name }}</td>
                            <td class="py-2.5 text-left px-7">{{ $customer->phone }}</td>
                            <td class="py-2.5 text-left px-7">{{ $customer->email }}</td>
                            <td class="py-2.5 text-left px-7">{{ $customer->address }}</td>
                            <td class="py-2.5 text-left px-7">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('customer.edit',$customer->id)}}"
                                        class="bg-orange-400 text-white font-semibold px-3 text-sm rounded py-1">Edit</button>
                                    <a href="{{ route('customer.destroy',$customer->id)}}"
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
