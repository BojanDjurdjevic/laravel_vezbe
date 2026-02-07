@extends('layout')
@section('title') Contact @endsection

@section('sadrzaj')

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <!-- Header -->
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-6 text-center">Kontaktirajte nas</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('send.contact') }}" class="space-y-5">
            @if ($errors->any())
                <p class="text-red-700">Greška: {{ $errors->first() }}</p>
            @endif

            @csrf
            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Unesite vaš email"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition">
            </div>

            <!-- Naslov -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="subject">Naslov</label>
                <input type="text" name="subject" id="subject" placeholder="Unesite naslov email-a"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 transition">
            </div>

            <!-- Poruka -->
            <div>
                <label class="block text-gray-700 font-medium mb-2" for="message">Poruka</label>
                <textarea name="message" id="message" placeholder="Unesite tekst poruke" rows="5"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 resize-none transition"></textarea>
            </div>

            <!-- Dugme -->
            <div class="text-center">
                <button type="submit"
                        class="px-6 py-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition transform duration-200">
                    Pošalji
                </button>
            </div>
        </form>
    </div>
</div>
@endsection