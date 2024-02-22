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
        <form action="{{ route('data.store', $type) }}" method="POST">
            @csrf    
            @include('modular.'.$type.'create')    
        </form>
    </main>
@endsection
