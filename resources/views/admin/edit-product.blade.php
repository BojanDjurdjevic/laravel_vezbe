@extends('layout')
@section('title') Ažuriraj proizvod @endsection

@section('sadrzaj')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <!-- Header -->
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 text-center">Unesite nove podatke</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('admin.product.update', $product) }}" class="space-y-5">
            @if ($errors->any())
                <p class="text-red-700">Greška: {{ $errors->first() }}</p>
            @endif

            @csrf
            @method('PUT')
            <!-- Naziv -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="name">Naziv</label>
                <input type="text" name="name" id="name" placeholder="Unesite naziv proizvoda"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition"
                    value="{{ old('name', $product->name) }}" />
            </div>

            <!-- Opis -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="description">Opis</label>
                <input type="text" name="description" id="description" placeholder="Unesite opis proizvoda"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition"
                    value="{{ old('description', $product->description) }}"   />
            </div>

            <!-- Stanje -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="amount">Količina</label>
                <input type="number" name="amount" id="amount" placeholder="Unesite količinu" rows="5"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 
                    focus:ring-indigo-400 focus:border-indigo-400 resize-none transition" 
                    value="{{ old('amount', $product->amount) }}" />
            </div>

            <!-- Cena -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="price">Cena</label>
                <input type="text" step="any" name="price" id="price" placeholder="Unesite cenu" rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 
                focus:ring-indigo-400 focus:border-indigo-400 resize-none transition" 
                value="{{ old('price', $product->price) }}" />
            </div>

             <!-- Slika -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="img">Slika</label>
                <input type="file" name="image" id="img" placeholder="Unesite cenu" rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none 
                focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 resize-none transition" 
                value="{{ old('image', $product->image || null) }}"/>
            </div>

            <!-- Dugme -->
            <div class="text-center">
                <button type="submit"
                        class="px-6 py-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 
                        text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition transform duration-200"
                >
                    Izmeni
                </button>
            </div>
        </form>
    </div>
</div>
@endsection