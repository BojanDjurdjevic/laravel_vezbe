<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-center">Korpa:</h3>
            @foreach ($products as $product)
                <div class="w-full p-3 mt-2 rounded-lg shadow-sm">
                    <p>Naziv proizvoda: {{ $product->name}}</p>
                </div>
            @endforeach
            
        </div>
    </div>
    <!--
        <div class="w-full p-3 mt-2 rounded-lg shadow-sm">
                    <p>Naziv proizvoda: {{ $product->name}}</p>
                    <p>Količina: {{ $product->ordered}}</p>
                </div>
    -->
</x-app-layout>