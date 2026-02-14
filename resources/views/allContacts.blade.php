@extends('layout')
@section('title') All contacts @endsection

@section('sadrzaj')
<div class="space-y-6">
    <h1 class="text-3xl font-bold text-indigo-600 text-center">Kontakti</h1>

    <div class="bg-white rounded-lg shadow-md p-6 space-y-3">
        <h3 class="text-xl font-semibold text-gray-800">Admin kontakti:</h3>
        @foreach ($contacts as $c)
            <div class="rounded-lg shadow-md p-6  divide-y divide-gray-500">
                <div class="p-1">
                    <p class="text-gray-700">Email: {{ $c->email }}</p>
                    <p class="text-gray-700 mt-1">Naslov: {{ $c->subject }}</p>
                    <p class="text-gray-700 mt-1">Poruka:</p>
                    <p class="text-gray-700 mt-1 mb-1">{{ $c->message }}</p>
                </div>
                <div class="mt-3 p-1 flex justify-around">
                    <form action="{{ route('contact.delete', $c->id) }}" method="POST"
                        onsubmit="return confirm('Da li ste siurni da želite da obrišete ovaj kontakt?')"
                        >
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="w-25 bg-red-600 hover:bg-red-800 rounded-md text-white p-1"
                        >Obriši</button>
                    </form>
                    <form action="">
                        <button class="w-25 bg-indigo-600 hover:bg-indigo-800 rounded-md text-white p-1">Edituj</button>
                    </form>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@endsection
