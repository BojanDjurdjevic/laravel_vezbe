@extends('layout')
@section('title') Home @endsection

@section('sadrzaj')
<div class="space-y-4 text-center">
    <h1 class="text-4xl font-bold text-indigo-600">Ovo je glavna stranica</h1>

    @if ($hour > 0 && $hour <= 12)
        <p class="text-gray-900 text-lg">Dobro jutro!</p>
    @else 
        <p class="text-gray-900 text-lg">Dobar dan!</p>
    @endif
    <p class="text-gray-700 text-lg">Trenutno vreme je <span class="font-mono">{{ $currentTime }}</span></p>
    <p class="text-gray-700 text-lg">Trenutno je <span class="font-mono">{{ $hour }} sati.</span></p>
</div>
<div class="rounded-lg shadow-md p-6">
    @foreach ($products as $p)
        <div class="rounded-lg shadow-md p-6 text-center">
            <p class="text-gray-700 text-lg">Naziv: {{ $p->name }}</p>
            <p class="text-gray-700 text-lg">Opis</p>
            <p class="text-gray-700 text-lg">{{ $p->description }}</p>
            <p class="text-gray-700 text-lg">Na stanju: {{ $p->amount }}</p>
            <p class="text-red-700 text-lg">Cena: {{ $p->price }} din.</p>
        </div>
    @endforeach
</div>
@endsection
