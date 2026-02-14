@extends('layout')
@section('title') Shop @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Shop stranica</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Proizvodi:</h3>
        @foreach ($products as $product)
            <div class="shadow-md p-6" >
                <p class="text-gray-700">{{ $product->name }}</p>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-gray-700">Cena: {{ $product->price }} din</p>
                <div class="mt-4">
                    <a href="{{ route('product.view', $product) }}" class="bg-indigo-600 text-white p-2 m-2 rounded-lg 
                        hover:scale-105 hover:shadow-lg transition transform duration-200"
                    >Pregled</a>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
