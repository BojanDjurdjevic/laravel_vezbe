<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-center">{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p>Na stanju: {{ $product->amount }}</p>
            <p>Cena: {{ $product->price }}</p>
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $product->id }}">
                <input type="number" name="amount" placeholder="Unesite količinu">
                <button type="submit"
                    class="bg-indigo-600 text-white rounded-lg m-2 p-2 hover:shadow-lg"
                >Dodaj u korpu</button>
            </form>
        </div>
    </div>
</x-app-layout>