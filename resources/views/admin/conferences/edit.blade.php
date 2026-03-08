<div>
    @extends('layouts.app')

    @section('title', 'Redaguoti konferenciją')

    @section('content')
        <h1 class="mb-4">Redaguoti konferenciją: {{ $conference->title }}</h1>

        @include('admin.conferences._form', [
            'action' => route('admin.conferences.update', $conference),
            'method' => 'PUT',
            'buttonText' => 'Atnaujinti konferenciją'
        ])
    @endsection
</div>
