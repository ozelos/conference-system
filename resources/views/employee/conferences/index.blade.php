<div>
    @extends('layouts.app')

@section('title', 'Konferencijos (Darbuotojas)')

@section('content')
    <h1 class="mb-4">Visos konferencijos</h1>

    @if ($conferences->isEmpty())
        <div class="alert alert-info text-center">
            Šiuo metu nėra jokių konferencijų.
        </div>
    @else
        <div class="row g-4">
            @foreach ($conferences as $conference)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $conference->title }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::limit($conference->description, 100) }}
                            </p>
                            <p><strong>Data:</strong> {{ $conference->date }} {{ $conference->time }}</p>
                            <p><strong>Vieta:</strong> {{ $conference->location }}</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('employee.conferences.show', $conference) }}" class="btn btn-info btn-sm">
                                Peržiūrėti + registruoti
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
</div>
