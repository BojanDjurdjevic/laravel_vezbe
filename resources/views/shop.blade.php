@extends('layout')
@section('title') Shop @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Shop stranica</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Proizvodi:</h3>
        <p class="text-gray-700">{{ $proizvod1 }}</p>
        <p class="text-gray-700">{{ $proizvod2 }}</p>
        <p class="text-gray-700">{{ $proizvod3 }}</p>
    </div>
</div>
@endsection
