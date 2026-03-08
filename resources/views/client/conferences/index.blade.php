<div>
    @extends('layouts.app')

    @section('title', 'Konferencijos')

    @section('content')
        <h1 class="mb-4">Galimos konferencijos</h1>

        @if($conferences->isEmpty())
            <p class="text-muted">Šiuo metu nėra planuojamų konferencijų.</p>
        @else
            <div class="row">
                @foreach($conferences as $conference)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $conference->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($conference->description, 120) }}</p>
                                <p><strong>Data:</strong> {{ $conference->date->format('Y-m-d') }} {{ $conference->time }}</p>
                                <p><strong>Vieta:</strong> {{ $conference->location }}</p>

                                <div class="mt-3">
                                    <a href="{{ route('client.conferences.show', $conference) }}" class="btn btn-info btn-sm">Peržiūrėti</a>

                                    <form action="{{ route('client.conferences.register', $conference) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Registruotis</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endsection
</div>
