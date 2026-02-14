<x-app-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
            <h3 class="text-center">{{ $myproduct->name }}</h3>
            <p>{{ $myproduct->description }}</p>
            <p>Na stanju: {{ $myproduct->amount }}</p>
            <p>Cena: {{ $myproduct->price }}</p>
        </div>
    </div>
</x-app-layout>