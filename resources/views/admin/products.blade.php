@extends('layout')
@section('title') Admin proizvodi @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Admin product stranica</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Proizvodi:</h3>
        @foreach ($products as $product)
            <div class="shadow-md p-6" >
                <p class="text-gray-700">ID: {{ $product->id }} | {{ $product->name }}</p>
                <p class="text-gray-700">{{ $product->description }}</p>
                <p class="text-red-700">Cena: {{ number_format($product->price, 2) }} din</p>
                <div class="mt-3 p-1 flex justify-around">
                    <form action="{{ route('admin.product.delete', $product->id) }}" method="POST"
                        onsubmit="return confirm('Da li ste siurni da želite da obrišete proizvod?')"
                        >
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="w-25 bg-red-600 hover:bg-red-800 rounded-md text-white p-1"
                        >Obriši</button>
                    </form>
                    <form action="">
                        <button class="w-25 bg-indigo-600 hover:bg-indigo-800 rounded-md text-white p-1">Edituj</button>
                    </form>
                </div>
            </div>  
        @endforeach

    </div>
</div>
@endsection
