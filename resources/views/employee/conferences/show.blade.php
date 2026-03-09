
<div class="card shadow-sm mt-4">
    <div class="card-header bg-light">
        <h6 class="mb-0">Užsiregistravę dalyviai: {{ $conference->registrations->count() }}</h6>
    </div>
    <div class="card-body">
        @if ($conference->registrations->isEmpty())
            <p class="text-muted text-center">Kol kas niekas neužsiregistravo į šią konferenciją.</p>
        @else
            <ul class="list-group list-group-flush">
                @foreach ($conference->registrations as $registration)
                    <li class="list-group-item">
                        {{ $registration->user->name ?? 'Vartotojas #' . $registration->user_id }}
                        <small class="text-muted d-block">
                            Užsiregistravo: {{ $registration->registered_at->format('Y-m-d H:i') }}
                        </small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>

