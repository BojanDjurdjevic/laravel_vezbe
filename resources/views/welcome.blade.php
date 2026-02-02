@extends('layout')
@section('title') Home @endsection

@section('sadrzaj')
<h1>Ovo je glavna stranica</h1>

<p>Trenutno vreme je {{ now()->format('H:i:s') }}</p> 
{{-- Može i ovako date('H:i:s') --}}
@endsection