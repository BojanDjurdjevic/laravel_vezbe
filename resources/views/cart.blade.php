<x-app-layout>
    @php
        $display = count($items) > 5 ? 'block' : 'hidden';
    @endphp
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-center">Korpa:</h3>
            <form method="POST" action="" class="text-center {{ $display }}">
                @csrf
                @method('POST')
                <button
                    class="bg-indigo-600 text-white p-2 m-2 rounded-lg 
                        hover:scale-105 hover:shadow-lg transition transform duration-200"
                >Poruči</button>
            </form>
            @foreach ($items as $item)
                <div class="w-full p-3 mt-2 rounded-lg shadow-sm">
                    <p>Naziv proizvoda: {{ $item['name']}}</p>
                    <p>Količina: {{ $item['amount']}}</p>
                    <p>Cena jedinice: {{ $item['price']}}</p>
                    <p>Ukupna cena: {{ $item['total']}}</p>
                </div>
            @endforeach
            <form method="GET" action="{{ route('cart.finish') }}" class="text-center">
                @csrf
                @method('GET')
                <button
                    class="bg-indigo-600 text-white p-2 m-2 rounded-lg 
                        hover:scale-105 hover:shadow-lg transition transform duration-200"
                >Poruči</button>
            </form>
        </div>
    </div>
    <!--
        <div class="w-full p-3 mt-2 rounded-lg shadow-sm">
                    <p>Naziv proizvoda: product-name </p>
                    <p>Količina: product-ordered </p>
                </div>
    -->
</x-app-layout>