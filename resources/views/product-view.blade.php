<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-center">{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>Na stanju: {{ $product->amount }}</p>
            <p>Cena: {{ $product->price }}</p>
        </div>
    </div>
</x-app-layout>