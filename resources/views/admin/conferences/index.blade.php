<div>
    @extends('layouts.app')

    @section('title', 'Konferencijų valdymas')

    @section('content')
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Konferencijos</h1>
            <a href="{{ route('admin.conferences.create') }}" class="btn btn-success">
                + Nauja konferencija
            </a>
        </div>

        @if ($conferences->isEmpty())
            <div class="alert alert-info">Nėra konferencijų</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Data ir laikas</th>
                        <th>Vieta</th>
                        <th>Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($conferences as $conference)
                        <tr>
                            <td>{{ $conference->title }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($conference->date)->format('Y-m-d') }}<br>
                                <small>{{ $conference->time }}</small>
                            </td>
                            <td>{{ $conference->location }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.conferences.edit', $conference) }}"
                                       class="btn btn-outline-primary">Redaguoti</a>

                                    @if (!$conference->is_past)
                                        <form action="{{ route('admin.conferences.destroy', $conference) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Ar tikrai norite ištrinti?')">
                                                Šalinti
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-outline-secondary" disabled>Negalima šalinti</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endsection
</div>
