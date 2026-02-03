@extends('layout')
@section('title') Admin proizvodi @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Admin product stranica</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Proizvodi:</h3>
        @foreach ($products as $product)
            <div class="shadow-md p-6" >
                <p class="text-gray-700">{{ $product->name }}</p>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-gray-700">Cena: {{ $product->price }} din</p>
            </div>  
        @endforeach

    </div>
</div>
@endsection
