<div>
    @extends('layouts.app')

    @section('title', 'Pagrindinis puslapis')

    @section('content')
        <div class="text-center py-5">
            <h1>Sveiki atvykę!</h1>
            <h3>Studentas: {{ $studentInfo['name'] }}</h3>
            <h4>Grupė: {{ $studentInfo['group'] }}</h4>

            <div class="row justify-content-center mt-5 g-4">
                <div class="col-md-4">
                    <a href="{{ route('client.conferences.index') }}" class="btn btn-primary btn-lg w-100">
                        Kliento posistemis
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('employee.conferences.index') }}" class="btn btn-success btn-lg w-100">
                        Darbuotojo posistemis
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-lg w-100">
                        Administratoriaus posistemis
                    </a>
                </div>
            </div>
        </div>
    @endsection
</div>
