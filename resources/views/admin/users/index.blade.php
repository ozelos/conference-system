<div>
    @extends('layouts.app')

    @section('title', 'Naudotojų valdymas')

    @section('content')
        <h1 class="mb-4">Sistemos naudotojai</h1>

        @if ($users->isEmpty())
            <div class="alert alert-info">Nėra registruotų naudotojų.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Vardas</th>
                        <th>El. paštas</th>
                        <th>Rolė</th>
                        <th>Veiksmai</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : ($user->role === 'employee' ? 'success' : 'primary') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-primary">
                                    Redaguoti
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endsection
</div>
