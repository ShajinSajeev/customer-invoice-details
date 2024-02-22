@extends('layouts.app')
@section('contents')
    <main class="px-7 flex-col flex gap-7 py-3">
        <div class="flex border-b py-2 justify-between">
            <h5 class="text-xl font-semibold">{{ucfirst($type)}} Management</h5>
            <a href="{{ route('data.new',$type) }}" class="bg-blue-500 text-white font-semibold px-3 rounded py-1.5">Add
                {{ucfirst($type)}}</a>
        </div>
        @include('modular.'.$type.'list')   
    </main>
@endsection
