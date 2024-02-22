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
                    <h5 class="text-xl font-semibold">Edit {{$type}}</h5>
                </div>

                @include('modular.'.$type.'edit')   
            </div>
        </form>
    </main>
@endsection
