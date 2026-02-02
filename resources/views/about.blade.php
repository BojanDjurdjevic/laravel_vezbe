@extends('layout')
@section('title') About @endsection

@section('sadrzaj')
<div class="space-y-4 text-center">
    <h1 class="text-3xl font-bold text-indigo-600">Ovo je ABOUT page</h1>
    <p class="text-gray-700 text-lg">A moje ime je: <span class="font-semibold">{{ $ime }} {{ $prezime }}</span></p>
</div>
@endsection
