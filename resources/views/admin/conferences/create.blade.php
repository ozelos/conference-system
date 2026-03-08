<div>
    @extends('layouts.app')

    @section('title', 'Nauja konferencija')

    @section('content')
        <h1 class="mb-4">Naujos konferencijos kūrimas</h1>

        @include('admin.conferences._form', [
            'action' => route('admin.conferences.store'),
            'buttonText' => 'Sukurti konferenciją'
        ])
    @endsection
</div>
