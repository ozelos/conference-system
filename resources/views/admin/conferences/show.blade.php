<div>
    @extends('layouts.app')

    @section('title', $conference->title)

    @section('content')
        <h1 class="mb-4">{{ $conference->title }}</h1>

        <div class="row mb-5">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Aprašymas</h5>
                        <p>{{ $conference->description }}</p>

                        <hr>

                        <div class="row text-muted small">
                            <div class="col-6">
                                <strong>Data:</strong> {{ $conference->date->format('Y-m-d') }}<br>
                                <strong>Laikas:</strong> {{ $conference->time }}
                            </div>
                            <div class="col-6">
                                <strong>Vieta:</strong> {{ $conference->location }}<br>
                                <strong>Lektoriai:</strong> {{ $conference->lecturers }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Registracijų skaičius: {{ $conference->registrations->count() }}</h6>
                    </div>
                    <div class="card-body">
                        @if($conference->registrations->isEmpty())
                            <p class="text-muted">Niekas dar neužsiregistravo</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach($conference->registrations as $registration)
                                    <li class="list-group-item">
                                        {{ $registration->user->name ?? 'Vartotojas #' . $registration->user_id }}
                                        <small class="text-muted d-block">
                                            {{ $registration->registered_at->format('Y-m-d H:i') }}
                                        </small>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <a href="{{ route('employee.conferences.index') }}" class="btn btn-outline-secondary">
            ← Grįžti į sąrašą
        </a>
    @endsection
</div>
