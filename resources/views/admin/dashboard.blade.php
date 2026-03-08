<div>
    @extends('layouts.app')

    @section('title', 'Administravimas')

    @section('content')
        <h1 class="mb-4">Sistemos administratorius</h1>

        <div class="row g-4">
            <!-- Kortelė: Naudotojų valdymas -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people fs-1 text-primary mb-3 d-block"></i>
                        <h5 class="card-title">Naudotojų valdymas</h5>
                        <p class="card-text text-muted">
                            Peržiūrėti ir redaguoti registruotų naudotojų vardus, pavardes
                        </p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                            Eiti į naudotojus →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Kortelė: Konferencijų valdymas -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-calendar-event fs-1 text-success mb-3 d-block"></i>
                        <h5 class="card-title">Konferencijų valdymas</h5>
                        <p class="card-text text-muted">
                            Kurti, redaguoti, šalinti konferencijas (išskyrus įvykusias)
                        </p>
                        <a href="{{ route('admin.conferences.index') }}" class="btn btn-success">
                            Eiti į konferencijas →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
