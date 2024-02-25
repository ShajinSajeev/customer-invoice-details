@extends('layouts.app')
@section('contents')
    <main class="px-7 flex-col flex gap-7 py-3">
        <div class="flex border-b py-2 justify-between">
            <h5 class="text-xl font-semibold">{{ ucfirst($type) }} Management</h5>
            <a href="{{ route('data.new', $type) }}" class="bg-blue-500 text-white font-semibold px-3 rounded py-1.5">Add
                {{ ucfirst($type) }}</a>
        </div>
        <div class="w-full overflow-hidden
        rounded-lg">
            <table class="table bg-white w-full">
                <thead class="bg-blue-200">
                    <tr>
                        <th class="py-2.5 text-left px-7">sl no</th>
                        @foreach ($labels as $key => $label)
                            <th class="py-2.5 text-left px-7">{{ ucfirst($label) }}</th>
                        @endforeach
                        <th class="py-2.5 text-left px-7">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $data)
                        <tr>
                            <td class="py-2.5 text-left px-7">{{ $loop->iteration }}</td>
                            @foreach ($labels as $key => $value)
                                <td class="py-2.5 text-left px-7">{{ ucfirst($data->$value) }}</td>
                            @endforeach
                            <td class="py-2.5 text-left px-7">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('data.edit', ['type' => $type, 'id' => $data->id]) }}"
                                        class="bg-orange-400 text-white font-semibold px-3 text-sm rounded py-1">Edit</button>
                                        <a href="{{ route('data.destroy', ['type' => $type, 'id' => $data->id]) }}"
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
