@extends('layout')
@section('title') Home @endsection

@section('sadrzaj')
<div class="space-y-4 text-center">
    <h1 class="text-4xl font-bold text-indigo-600">Ovo je glavna stranica</h1>
    <p class="text-gray-700 text-lg">Trenutno vreme je <span class="font-mono">{{ now()->format('H:i:s') }}</span></p>
</div>
@endsection
