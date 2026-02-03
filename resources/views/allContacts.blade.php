@extends('layout')
@section('title') All contacts @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Kontakti</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Admin kontakti:</h3>
        @foreach ($contacts as $c)
            <div class="rounded-lg shadow-md p-6">
                <p class="text-gray-700">Email: {{ $c->email }}</p>
                <p class="text-gray-700">Naslov: {{ $c->subject }}</p>
                <p class="text-gray-700">Poruka:</p>
                <p class="text-gray-700">{{ $c->message }}</p>
            </div>
        @endforeach
        
    </div>
</div>
@endsection
