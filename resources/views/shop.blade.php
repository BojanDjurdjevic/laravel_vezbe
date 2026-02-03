@extends('layout')
@section('title') Shop @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Shop stranica</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Proizvodi:</h3>
        @foreach ($products as $product)
            @if ( in_array($product, ['Šahovske završnice']))
                <div class="shadow-md p-6" >
                    <p class="text-gray-700">{{ $product->name }} - SUPER SNIŽENJE</p>
                    <p class="text-gray-700">{{ $product->description }}</p>
                    <p class="text-gray-700">Cena: {{ $product->price }} din</p>
                </div>
                
            @else 

            <div class="shadow-md p-6" >
                <p class="text-gray-700">{{ $product->name }}</p>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-gray-700">Cena: {{ $product->price }} din</p>
            </div>
            
            @endif
            
        @endforeach

    </div>
</div>
@endsection
